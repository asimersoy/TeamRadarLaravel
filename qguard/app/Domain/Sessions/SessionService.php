<?php

namespace App\Domain\Sessions;

use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Events\RoomChanged;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class SessionService
{
    public function participant(User $actor, int $sessionId): object
    {
        abort_unless($actor->hasVerifiedEmail(), 403);
        $p = DB::table('session_participants')->where(['game_session_id' => $sessionId, 'user_id' => $actor->id])->first();
        abort_unless($p && $p->state !== 'removed_no_show', 403);

        return $p;
    }

    public function changed(int $sessionId): void
    {
        DB::table('game_sessions')->where('id', $sessionId)->increment('version');
        $version = (int) DB::table('game_sessions')->where('id', $sessionId)->value('version');
        DB::afterCommit(function () use ($sessionId, $version) {
            try {
                RoomChanged::dispatch($sessionId, $version);
            } catch (\Throwable) {
                Log::warning('Room notification unavailable; authorized polling remains active.', ['session_id' => $sessionId]);
            }
        });
    }

    public function acknowledge(User $actor, int $id): void
    {
        MembershipTransaction::run(function () use ($actor, $id) {
            $room = DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
            $p = $this->participant($actor, $id);
            SocialService::require($room->state === 'active' && in_array($p->state, ['matched', 'acknowledged']), 'This participation is no longer active.');
            $request = DB::table('no_show_requests')->where(['game_session_id' => $id, 'target_id' => $actor->id])->whereIn('state', ['voting', 'responding'])->lockForUpdate()->first();
            SocialService::require(! $request?->response_deadline || now()->lt(Carbon::parse($request->response_deadline)), 'The response deadline has passed.');
            DB::table('session_participants')->where('id', $p->id)->update(['state' => 'acknowledged', 'acknowledged_at' => now(), 'updated_at' => now()]);
            if ($request) {
                DB::table('no_show_requests')->where('id', $request->id)->update(['state' => 'cancelled_acknowledged', 'updated_at' => now()]);
            }
            $this->changed($id);
        });
    }

    public function end(User $actor, int $id): void
    {
        MembershipTransaction::run(function () use ($actor, $id) {
            DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
            $p = $this->participant($actor, $id);
            if ($p->state === 'ended') {
                return;
            }
            DB::table('session_participants')->where('id', $p->id)->update(['state' => 'ended', 'ended_at' => now(), 'updated_at' => now()]);
            DB::table('active_participations')->where(['user_id' => $actor->id, 'game_session_id' => $id])->delete();
            DB::table('no_show_requests')->where(['game_session_id' => $id, 'target_id' => $actor->id])->whereIn('state', ['voting', 'responding'])->update(['state' => 'stale_target_ended', 'updated_at' => now()]);
            $this->changed($id);
        });
    }

    public function vote(User $actor, int $id, int $target): void
    {
        MembershipTransaction::run(function () use ($actor, $id, $target) {
            $room = DB::table('game_sessions')->where('id', $id)->lockForUpdate()->first();
            $p = $this->participant($actor, $id);
            SocialService::require($room->state === 'active' && in_array($p->state, ['matched', 'acknowledged']) && now()->gte(Carbon::parse($room->created_at)->addMinutes(5)), 'No-show voting starts five minutes after matching, for active participants only.');
            $other = DB::table('session_participants')->where(['game_session_id' => $id, 'user_id' => $target])->first();
            SocialService::require($other && $other->user_id !== $actor->id && $other->state === 'matched', 'Choose an unacknowledged teammate, not yourself.');
            $request = DB::table('no_show_requests')->where('game_session_id', $id)->whereIn('state', ['voting', 'responding'])->lockForUpdate()->first();
            SocialService::require(! $request || $request->target_id === $target, 'Another no-show request is already open.');
            $requestId = $request?->id ?? DB::table('no_show_requests')->insertGetId(['game_session_id' => $id, 'target_id' => $target, 'created_at' => now(), 'updated_at' => now()]);
            DB::table('no_show_votes')->insertOrIgnore(['no_show_request_id' => $requestId, 'voter_id' => $actor->id, 'created_at' => now()]);
            if (! $request?->response_deadline && DB::table('no_show_votes')->where('no_show_request_id', $requestId)->count() === 4) {
                DB::table('no_show_requests')->where('id', $requestId)->update(['state' => 'responding', 'response_deadline' => now()->addSeconds(30), 'updated_at' => now()]);
            }
            $this->changed($id);
        });
    }

    public function deadlines(): int
    {
        $count = 0;
        foreach (DB::table('no_show_requests')->where('state', 'responding')->where('response_deadline', '<=', now())->pluck('id') as $requestId) {
            $count += MembershipTransaction::run(function () use ($requestId) {
                $request = DB::table('no_show_requests')->where('id', $requestId)->lockForUpdate()->first();
                if ($request->state !== 'responding' || now()->lt(Carbon::parse($request->response_deadline))) {
                    return 0;
                }
                $room = DB::table('game_sessions')->where('id', $request->game_session_id)->lockForUpdate()->first();
                $target = DB::table('session_participants')->where(['game_session_id' => $room->id, 'user_id' => $request->target_id])->first();
                $valid = $room->state === 'active' && ! $room->settled_at && $target->state === 'matched';
                DB::table('no_show_requests')->where('id', $requestId)->update(['state' => $valid ? 'removed' : 'stale', 'updated_at' => now()]);
                if (! $valid) {
                    return 0;
                }
                DB::table('session_participants')->where('id', $target->id)->update(['state' => 'removed_no_show', 'updated_at' => now()]);
                DB::table('game_sessions')->where('id', $room->id)->update(['state' => 'disbanded_no_show', 'updated_at' => now()]);
                DB::table('active_participations')->where('game_session_id', $room->id)->delete();
                $this->changed($room->id);

                return 1;
            });
        }

        return $count;
    }

    public function canPost(object $room, object $participant): bool
    {
        return $room->state === 'active' && ! $room->settled_at && (! $room->feedback_deadline || now()->lt(Carbon::parse($room->feedback_deadline))) && in_array($participant->state, ['matched', 'acknowledged']);
    }
}
