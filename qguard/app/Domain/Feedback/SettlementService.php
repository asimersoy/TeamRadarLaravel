<?php

namespace App\Domain\Feedback;

use App\Domain\Honor\HonorCalculator;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class SettlementService
{
    public function due(): void
    {
        foreach (DB::table('game_sessions')->where('state', 'active')->whereNull('settled_at')->where('feedback_deadline', '<=', now())->pluck('id') as $id) {
            $this->settle($id);
        }
    }

    public function settle(int $sessionId): ?int
    {
        return MembershipTransaction::run(function () use ($sessionId) {
            $room = DB::table('game_sessions')->where('id', $sessionId)->lockForUpdate()->first();
            if (! $room || $room->state !== 'active') {
                return null;
            }
            if ($room->settled_at) {
                return DB::table('honor_settlements')->where('game_session_id', $sessionId)->value('id');
            }
            $submissions = DB::table('feedback_submissions')->where('game_session_id', $sessionId)->get()->keyBy('participant_id');
            if ($submissions->count() < 5 && (! $room->feedback_deadline || now()->lt(Carbon::parse($room->feedback_deadline)))) {
                return null;
            }
            $roster = DB::table('session_participants')->where('game_session_id', $sessionId)->get()->keyBy('id');
            $counts = DB::table('conduct_reports')->where(['game_session_id' => $sessionId, 'late' => false])->whereIn('category', ['early_leave', 'harmful_language'])->whereColumn('reporter_participant_id', '!=', 'target_participant_id')->selectRaw('target_participant_id, count(distinct reporter_participant_id) as reporters')->groupBy('target_participant_id')->pluck('reporters', 'target_participant_id');
            $invalid = [];
            foreach ($roster as $p) {
                $reasons = [];
                if (($counts[$p->id] ?? 0) >= 2) {
                    $reasons[] = 'two_distinct_reporters';
                }if ($submissions[$p->id]->self_admitted_early_leave ?? false) {
                    $reasons[] = 'self_admitted_early_leave';
                }if ($reasons) {
                    $invalid[$p->id] = ['user_id' => $p->user_id, 'reporter_count' => (int) ($counts[$p->id] ?? 0), 'reasons' => $reasons];
                }
            }
            $ratings = DB::table('behavior_ratings')->whereIn('submission_id', $submissions->pluck('id'))->orderBy('recipient_participant_id')->orderBy('reviewer_participant_id')->orderBy('id')->get();
            $exclusions = [];
            $eligible = [];
            foreach ($ratings as $rating) {
                $reviewer = $roster[$rating->reviewer_participant_id];
                $recipient = $roster[$rating->recipient_participant_id];
                $reasons = $invalid[$reviewer->id]['reasons'] ?? [];
                if ($reviewer->id === $recipient->id || $reviewer->origin_party_id === $recipient->origin_party_id) {
                    $reasons[] = 'same_original_premade';
                }if ($reasons) {
                    $exclusions[] = ['rating_id' => $rating->id, 'reasons' => $reasons];
                } else {
                    $eligible[] = $rating;
                }
            }
            $parameters = config('honor.parameters');
            $version = config('honor.version');
            $calculator = app(HonorCalculator::class, ['settings' => $parameters]);
            $settlement = DB::table('honor_settlements')->insertGetId(['game_session_id' => $sessionId, 'calculation_version' => $version, 'parameters' => json_encode($parameters), 'exclusions' => json_encode($exclusions), 'created_at' => now()]);
            $recipientIds = collect($eligible)->map(fn ($r) => $roster[$r->recipient_participant_id]->user_id)->unique()->sort()->values();
            $states = DB::table('honor_states')->whereIn('user_id', $recipientIds)->orderBy('user_id')->lockForUpdate()->get()->keyBy('user_id');
            foreach ($eligible as $rating) {
                $userId = $roster[$rating->recipient_participant_id]->user_id;
                $stored = $states[$userId];
                $before = ['honor_score' => (float) $stored->honor_score, 'smoothed_raw_rating_reference' => $stored->smoothed_raw_rating_reference === null ? null : (float) $stored->smoothed_raw_rating_reference, 'eligible_rating_count' => (int) $stored->eligible_rating_count];
                $input = HonorCalculator::input([(int) $rating->communication, (int) $rating->sportsmanship, (int) $rating->effort]);
                $after = $calculator->step($before, $input);
                DB::table('honor_states')->where('user_id', $userId)->update($after + ['calculation_version' => $version, 'updated_at' => now()]);
                DB::table('honor_applications')->insert(['settlement_id' => $settlement, 'rating_id' => $rating->id, 'recipient_id' => $userId, 'input_rating' => $input, 'before_state' => json_encode($before), 'after_state' => json_encode($after), 'created_at' => now()]);
                $states[$userId] = (object) $after;
            }
            if ($invalid) {
                CaseEvidence::flag($sessionId, false, ['settlement_id' => $settlement, 'participants' => $invalid, 'excluded_inputs' => $exclusions]);
            }
            DB::table('game_sessions')->where('id', $sessionId)->update(['settled_at' => now(), 'updated_at' => now()]);
            DB::table('no_show_requests')->where('game_session_id', $sessionId)->whereIn('state', ['voting', 'responding'])->update(['state' => 'stale_session_settled', 'updated_at' => now()]);
            app(SessionService::class)->changed($sessionId);

            return $settlement;
        });
    }
}
