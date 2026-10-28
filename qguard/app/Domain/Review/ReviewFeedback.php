<?php

namespace App\Domain\Review;

use App\Domain\Feedback\CaseEvidence;
use App\Domain\Honor\HonorCalculator;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Domain\Sessions\SessionService;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class ReviewFeedback
{
    public function debt(int $userId): ?int
    {
        $sessions = DB::table('review_feedback_cards')->where('author_id', $userId)->whereNull('submitted_at')->select('game_session_id')->distinct()->orderBy('game_session_id')->limit(2)->pluck('game_session_id');
        if ($sessions->count() > 1) {
            Log::warning('Unexpected multiple unfinished sessions; preserving all obligations.', ['user_id' => $userId]);
        }

        return $sessions->first();
    }

    public function submit(User $actor, int $sessionId, int $recipient, array $input): int
    {
        app(ReviewSession::class)->due();
        validator($input, ['overall' => 'required|integer|between:1,10', 'communication' => 'nullable|integer|between:0,100', 'play_style' => 'nullable|integer|between:0,100'])->validate();

        return MembershipTransaction::run(function () use ($actor, $sessionId, $recipient, $input) {
            $room = app(ReviewSession::class)->room($actor, $sessionId);
            SocialService::require($room->state === 'ended', 'Feedback opens after the shared session ends.');
            $card = DB::table('review_feedback_cards')->where(['game_session_id' => $sessionId, 'author_id' => $actor->id, 'recipient_id' => $recipient])->lockForUpdate()->first();
            abort_unless($card, 403);
            $values = ['overall' => (int) $input['overall'], 'communication' => isset($input['communication']) ? (int) $input['communication'] : null, 'play_style' => isset($input['play_style']) ? (int) $input['play_style'] : null];
            if ($card->submitted_at) {
                SocialService::require($values === array_intersect_key((array) $card, $values), 'This submitted card is locked.');

                return $card->id;
            }
            DB::table('review_feedback_cards')->where('id', $card->id)->update($values + ['submitted_at' => now()]);
            $reason = $this->exclusion($sessionId, $actor->id);
            $inputs = ['honor' => ($values['overall'] - 1) * 100 / 9];
            foreach (['communication', 'play_style'] as $trait) {
                if ($values[$trait] !== null) {
                    $inputs[$trait] = $values[$trait];
                }
            }
            $parameters = config('honor.parameters');
            $calculator = new HonorCalculator($parameters);
            foreach ($inputs as $dimension => $value) {
                $before = $after = null;
                if (! $reason) {
                    $table = $dimension === 'honor' ? 'honor_states' : 'descriptor_states';
                    $key = ['user_id' => $recipient] + ($dimension === 'honor' ? [] : ['dimension' => $dimension]);
                    if ($dimension !== 'honor') {
                        DB::table($table)->insertOrIgnore($key + ['calculation_version' => 'review-v2', 'updated_at' => now()]);
                    }
                    $state = DB::table($table)->where($key)->lockForUpdate()->first();
                    $before = ['honor_score' => (float) $state->honor_score, 'smoothed_raw_rating_reference' => $state->smoothed_raw_rating_reference === null ? null : (float) $state->smoothed_raw_rating_reference, 'eligible_rating_count' => (int) $state->eligible_rating_count];
                    $after = $calculator->step($before, $value);
                    DB::table($table)->where($key)->update($after + ['calculation_version' => 'review-v2', 'updated_at' => now()]);
                }
                DB::table('review_score_applications')->insert(['card_id' => $card->id, 'recipient_id' => $recipient, 'dimension' => $dimension, 'input_rating' => $value, 'calculation_version' => 'review-v2', 'parameters' => json_encode($parameters), 'exclusion_reason' => $reason, 'before_state' => $before ? json_encode($before) : null, 'after_state' => $after ? json_encode($after) : null, 'created_at' => now()]);
            }
            if ($reason) {
                CaseEvidence::flag($sessionId);
            }
            app(SessionService::class)->changed($sessionId);

            return $card->id;
        });
    }

    public function exclusion(int $sessionId, int $userId): ?string
    {
        if (DB::table('session_admissions')->where(['game_session_id' => $sessionId, 'user_id' => $userId])->exists()) {
            return 'self_admitted_early_leave';
        }
        $participant = DB::table('session_participants')->where(['game_session_id' => $sessionId, 'user_id' => $userId])->value('id');
        $count = DB::table('conduct_reports')->where(['game_session_id' => $sessionId, 'target_participant_id' => $participant])->whereIn('category', ['early_leave', 'harmful_language'])->distinct()->count('reporter_participant_id');

        return $count >= 2 ? 'two_distinct_reporters' : null;
    }

    public function report(User $actor, int $sessionId, int $targetId, string $category, string $note = ''): void
    {
        validator(compact('category', 'note'), ['category' => 'required|in:early_leave,harmful_language', 'note' => 'nullable|string|max:2000'])->validate();
        MembershipTransaction::run(function () use ($actor, $sessionId, $targetId, $category, $note) {
            app(ReviewSession::class)->room($actor, $sessionId);
            $author = app(SessionService::class)->participant($actor, $sessionId);
            $target = DB::table('session_participants')->where(['game_session_id' => $sessionId, 'user_id' => $targetId])->first();
            abort_unless($target && $targetId !== $actor->id, 403);
            $key = ['game_session_id' => $sessionId, 'reporter_participant_id' => $author->id, 'target_participant_id' => $target->id, 'category' => $category];
            $existing = DB::table('conduct_reports')->where($key)->first();
            SocialService::require(! $existing || ($existing->note ?? '') === $note, 'That report is already recorded and cannot be edited.');
            if ($existing) {
                return;
            }
            $applied = DB::table('review_feedback_cards as c')->join('review_score_applications as a', 'a.card_id', '=', 'c.id')->where('c.game_session_id', $sessionId)->where('c.author_id', $targetId)->whereNull('a.exclusion_reason')->exists();
            DB::table('conduct_reports')->insert($key + ['note' => $note, 'late' => $applied, 'created_at' => now()]);
            CaseEvidence::flag($sessionId, $applied);
        });
    }

    public function admit(User $actor, int $sessionId): void
    {
        MembershipTransaction::run(function () use ($actor, $sessionId) {
            app(ReviewSession::class)->room($actor, $sessionId);
            DB::table('session_admissions')->insertOrIgnore(['game_session_id' => $sessionId, 'user_id' => $actor->id, 'created_at' => now()]);
            CaseEvidence::flag($sessionId);
        });
    }

    public function summaries(User $actor): array
    {
        abort_unless($actor->hasVerifiedEmail(), 403);
        $result = [];
        foreach (['communication', 'play_style'] as $trait) {
            $count = DB::table('review_score_applications as a')->join('review_feedback_cards as c', 'c.id', '=', 'a.card_id')->where('a.recipient_id', $actor->id)->where('a.dimension', $trait)->whereNull('a.exclusion_reason')->distinct()->count('c.author_id');
            $result[$trait] = ['status' => $count === 0 ? 'No feedback yet' : ($count < 3 ? 'Not enough feedback yet' : 'Available'), 'value' => $count < 3 ? null : (float) DB::table('descriptor_states')->where(['user_id' => $actor->id, 'dimension' => $trait])->value('honor_score')];
        }

        return $result;
    }
}
