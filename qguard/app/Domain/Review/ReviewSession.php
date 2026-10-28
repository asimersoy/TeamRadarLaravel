<?php

namespace App\Domain\Review;

use App\Domain\Feedback\CaseEvidence;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Domain\Sessions\SessionService;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class ReviewSession
{
    public function room(User $actor, int $id): object
    {
        app(SessionService::class)->participant($actor, $id);
        $room = DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
        abort_unless($room && $room->workflow_version === 'review-v2', 404);

        return $room;
    }

    public function end(User $actor, int $id): void
    {
        $this->due();
        MembershipTransaction::run(function () use ($actor, $id) {
            $room = $this->room($actor, $id);
            if ($room->state !== 'active') {
                return;
            }
            DB::table('session_end_requests')->insertOrIgnore(['game_session_id' => $id, 'user_id' => $actor->id, 'created_at' => now()]);
            if (! $room->end_deadline) {
                DB::table('game_sessions')->where('id', $id)->update(['end_deadline' => now()->addMinutes(5), 'updated_at' => now()]);
            }
            if (DB::table('session_end_requests')->where('game_session_id', $id)->count() >= 3 || ($room->end_deadline && now()->gte(Carbon::parse($room->end_deadline)))) {
                $this->close($id, 'shared_end');
            }
            app(SessionService::class)->changed($id);
        });
    }

    public function due(): void
    {
        foreach (DB::table('game_sessions')->where(['workflow_version' => 'review-v2', 'state' => 'active'])->where('end_deadline', '<=', now())->pluck('id') as $id) {
            MembershipTransaction::run(function () use ($id) {
                $room = DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
                if ($room->state === 'active' && $room->end_deadline && now()->gte(Carbon::parse($room->end_deadline))) {
                    $this->close($id, 'shared_end');
                }
            });
        }
    }

    // Call only inside the shared membership transaction; closure retains all evidence.
    public function close(int $id, string $reason): void
    {
        $room = DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
        if ($room->state !== 'active') {
            return;
        }
        $roster = DB::table('session_participants')->where('game_session_id', $id)->get();
        $pending = DB::table('lobby_discrepancies')->where(['game_session_id' => $id, 'state' => 'pending'])->exists();
        $played = $reason === 'shared_end' && ! $pending && $roster->every(fn ($p) => $p->acknowledged_at !== null);
        DB::table('game_sessions')->where('id', $id)->update(['state' => $played ? 'ended' : 'disbanded', 'closed_at' => now(), 'closure_reason' => $played ? $reason : ($reason === 'shared_end' ? 'before_play' : $reason), 'updated_at' => now()]);
        DB::table('session_participants')->where('game_session_id', $id)->where('state', '!=', 'removed_no_show')->update(['state' => 'ended', 'ended_at' => now(), 'updated_at' => now()]);
        DB::table('active_participations')->where('game_session_id', $id)->delete();
        DB::table('lobby_discrepancies')->where(['game_session_id' => $id, 'state' => 'pending'])->update(['state' => 'closed_unresolved', 'resolved_at' => now()]);
        DB::table('no_show_requests')->where('game_session_id', $id)->whereIn('state', ['voting', 'responding'])->update(['state' => 'stale_session_closed', 'updated_at' => now()]);
        if ($played) {
            foreach ($roster as $author) {
                foreach ($roster as $target) {
                    if ($author->user_id !== $target->user_id && $author->origin_party_id !== $target->origin_party_id) {
                        DB::table('review_feedback_cards')->insertOrIgnore(['game_session_id' => $id, 'author_id' => $author->user_id, 'recipient_id' => $target->user_id, 'created_at' => now()]);
                    }
                }
            }
        }
        app(SessionService::class)->changed($id);
    }

    public function code(User $actor, int $id, string $code, int $expectedVersion): void
    {
        $this->due();
        $code = trim($code);
        validator(compact('code'), ['code' => ['required', 'string', 'max:256', 'not_regex:/[\x00-\x1F\x7F]/u']])->validate();
        MembershipTransaction::run(function () use ($actor, $id, $code, $expectedVersion) {
            $room = $this->room($actor, $id);
            abort_unless($room->coordinator_id === $actor->id, 403);
            SocialService::require($room->state === 'active', 'This session is closed.');
            $version = (int) DB::table('party_code_versions')->where('game_session_id', $id)->max('version');
            SocialService::require($version === $expectedVersion, 'The party code changed. Reload before replacing it.');
            DB::table('party_code_versions')->insert(['game_session_id' => $id, 'host_id' => $actor->id, 'version' => $version + 1, 'code' => $code, 'created_at' => now()]);
            app(SessionService::class)->changed($id);
        });
    }

    public function dispute(User $actor, int $id, int $targetId): void
    {
        $this->due();
        MembershipTransaction::run(function () use ($actor, $id, $targetId) {
            $room = $this->room($actor, $id);
            SocialService::require($room->state === 'active', 'This session is closed.');
            $target = DB::table('session_participants')->where(['game_session_id' => $id, 'user_id' => $targetId])->first();
            abort_unless($target && $targetId !== $actor->id, 403);
            $pending = DB::table('lobby_discrepancies')->where(['game_session_id' => $id, 'state' => 'pending'])->first();
            if ($pending && $pending->reporter_id === $actor->id && $pending->target_id === $targetId) {
                return;
            }
            SocialService::require(! $pending, 'Finish the current account/rank check first.');
            DB::table('lobby_discrepancies')->insert(['game_session_id' => $id, 'reporter_id' => $actor->id, 'target_id' => $targetId, 'claimed_rank' => $target->rank_snapshot, 'created_at' => now()]);
            CaseEvidence::flag($id);
            app(SessionService::class)->changed($id);
        });
    }

    public function corroborate(User $actor, int $id, int $discrepancyId, bool $mismatch): void
    {
        $this->due();
        MembershipTransaction::run(function () use ($actor, $id, $discrepancyId, $mismatch) {
            $room = $this->room($actor, $id);
            $d = DB::table('lobby_discrepancies')->where(['id' => $discrepancyId, 'game_session_id' => $id])->first();
            abort_unless($d && ! in_array($actor->id, [$d->reporter_id, $d->target_id]), 403);
            SocialService::require($room->state === 'active' && $d->state === 'pending', 'This check is no longer open.');
            $old = DB::table('lobby_discrepancy_votes')->where(['discrepancy_id' => $d->id, 'user_id' => $actor->id])->first();
            SocialService::require(! $old || $old->mismatch === $mismatch, 'Your response is already recorded.');
            if ($old) {
                return;
            }
            DB::table('lobby_discrepancy_votes')->insert(['discrepancy_id' => $d->id, 'user_id' => $actor->id, 'mismatch' => $mismatch, 'created_at' => now()]);
            if ($mismatch || DB::table('lobby_discrepancy_votes')->where('discrepancy_id', $d->id)->count() === 3) {
                DB::table('lobby_discrepancies')->where('id', $d->id)->update(['state' => $mismatch ? 'confirmed' : 'cleared', 'resolved_at' => now()]);
                if ($mismatch) {
                    $this->close($id, 'account_rank_discrepancy');
                }
            }
            CaseEvidence::flag($id);
            app(SessionService::class)->changed($id);
        });
    }
}
