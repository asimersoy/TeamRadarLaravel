<?php

namespace App\Domain\Feedback;

use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Domain\Sessions\SessionService;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class FeedbackService
{
    public function finalize(User $actor, int $sessionId, array $targets = [], bool $admitted = false, bool $skip = false): int
    {
        return MembershipTransaction::run(function () use ($actor, $sessionId, $targets, $admitted, $skip) {
            $room = DB::table('game_sessions')->where('id', $sessionId)->lockForUpdate()->first();
            $p = app(SessionService::class)->participant($actor, $sessionId);
            $existing = DB::table('feedback_submissions')->where(['game_session_id' => $sessionId, 'participant_id' => $p->id])->first();
            if ($existing) {
                return $existing->id;
            }
            SocialService::require($p->state === 'ended' && $room->state === 'active' && ! $room->settled_at && (! $room->feedback_deadline || now()->lt(Carbon::parse($room->feedback_deadline))), 'Numeric feedback is closed. Late evidence can still go to human review.');
            SocialService::require(count($targets) <= 4, 'Only your four matched teammates can be reviewed.');
            $roster = DB::table('session_participants')->where('game_session_id', $sessionId)->get()->keyBy('user_id');
            $prepared = [];
            foreach ($skip ? [] : $targets as $userId => $row) {
                $target = $roster[$userId] ?? null;
                SocialService::require($target && $target->id !== $p->id, 'Choose another actual teammate.');
                validator(['row' => $row], ['row' => 'array:communication,sportsmanship,effort,early_leave,harmful_language,note,rank', 'row.communication' => 'nullable|integer|between:1,10', 'row.sportsmanship' => 'nullable|integer|between:1,10', 'row.effort' => 'nullable|integer|between:1,10', 'row.early_leave' => 'sometimes|boolean', 'row.harmful_language' => 'sometimes|boolean', 'row.note' => 'nullable|string|max:2000', 'row.rank' => 'sometimes|in:matches,different,not_observed'])->validate();
                $dimensions = array_map(fn ($k) => $row[$k] ?? null, ['communication', 'sportsmanship', 'effort']);
                $filled = count(array_filter($dimensions, fn ($v) => $v !== null && $v !== ''));
                SocialService::require($filled === 0 || $filled === 3, 'Complete all three dimensions for a player, or leave all three blank.');
                SocialService::require(! $filled || $target->origin_party_id !== $p->origin_party_id, 'Original premade teammates cannot rate each other.');
                $prepared[] = ['target' => $target, 'row' => $row, 'dimensions' => $filled ? array_map('intval', $dimensions) : null];
            }
            $id = DB::table('feedback_submissions')->insertGetId(['game_session_id' => $sessionId, 'participant_id' => $p->id, 'skipped' => $skip, 'self_admitted_early_leave' => ! $skip && $admitted, 'finalized_at' => now()]);
            $flag = ! $skip && $admitted;
            foreach ($prepared as $item) {
                $row = $item['row'];
                $target = $item['target'];
                if ($item['dimensions']) {
                    DB::table('behavior_ratings')->insert(['submission_id' => $id, 'reviewer_participant_id' => $p->id, 'recipient_participant_id' => $target->id] + array_combine(['communication', 'sportsmanship', 'effort'], $item['dimensions']));
                }
                foreach (['early_leave', 'harmful_language'] as $category) {
                    if ($row[$category] ?? false) {
                        DB::table('conduct_reports')->insert(['game_session_id' => $sessionId, 'reporter_participant_id' => $p->id, 'target_participant_id' => $target->id, 'category' => $category, 'note' => $row['note'] ?? null, 'created_at' => now()]);
                        $flag = true;
                    }
                }
                $rank = $row['rank'] ?? 'not_observed';
                DB::table('rank_observations')->insert(['submission_id' => $id, 'target_participant_id' => $target->id, 'observation' => $rank]);
                $flag = $flag || $rank === 'different';
            }
            if ($flag) {
                CaseEvidence::flag($sessionId);
            }
            if (! $room->feedback_started_at) {
                DB::table('game_sessions')->where('id', $sessionId)->update(['feedback_started_at' => now(), 'feedback_deadline' => now()->addMinutes(10), 'updated_at' => now()]);
            }
            app(SettlementService::class)->settle($sessionId);
            app(SessionService::class)->changed($sessionId);

            return $id;
        });
    }

    public function lateReport(User $actor, int $sessionId, int $targetId, string $category, string $note): void
    {
        MembershipTransaction::run(function () use ($actor, $sessionId, $targetId, $category, $note) {
            $room = DB::table('game_sessions')->where('id', $sessionId)->lockForUpdate()->first();
            $p = app(SessionService::class)->participant($actor, $sessionId);
            SocialService::require($room->settled_at || $room->state !== 'active' || ($room->feedback_deadline && now()->gte(Carbon::parse($room->feedback_deadline))), 'Use ordinary feedback while its window is open.');
            $target = DB::table('session_participants')->where(['game_session_id' => $sessionId, 'user_id' => $targetId])->first();
            SocialService::require($target && $target->id !== $p->id, 'Choose another matched teammate.');
            validator(compact('category', 'note'), ['category' => 'required|in:early_leave,harmful_language,rank_discrepancy', 'note' => 'required|string|max:2000'])->validate();
            $identity = ['game_session_id' => $sessionId, 'reporter_participant_id' => $p->id, 'target_participant_id' => $target->id, 'category' => $category, 'late' => true];
            $existing = DB::table('conduct_reports')->where($identity)->first();
            SocialService::require(! $existing || $existing->note === $note, 'You already finalized late evidence in this category for this teammate. That original evidence is retained and cannot be overwritten.');
            if (! $existing) {
                DB::table('conduct_reports')->insert($identity + ['note' => $note, 'created_at' => now()]);
                CaseEvidence::flag($sessionId, true);
            }
        });
    }
}
