<?php

namespace App\Domain\Parties;

use App\Domain\Game\Valorant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class PartyService
{
    public function create(User $actor): int
    {
        return MembershipTransaction::run(function () use ($actor) {
            DB::table('users')->where('id', $actor->id)->lockForUpdate()->first();
            SocialService::require(! DB::table('active_participations')->where('user_id', $actor->id)->exists(), 'You already have an active party or session.');
            $id = DB::table('parties')->insertGetId(['owner_id' => $actor->id, 'shard' => $actor->shard, 'language' => $actor->language, 'created_at' => now(), 'updated_at' => now()]);
            DB::table('party_memberships')->insert(['party_id' => $id, 'user_id' => $actor->id, 'joined_at' => now()]);
            DB::table('active_participations')->insert(['party_id' => $id, 'user_id' => $actor->id]);

            return $id;
        });
    }

    public function current(User $actor): ?object
    {
        $slot = DB::table('active_participations')->where('user_id', $actor->id)->first();

        return $slot?->party_id ? DB::table('parties')->find($slot->party_id) : null;
    }

    private function locked(User $actor, bool $owner = false): object
    {
        $party = $this->current($actor);
        SocialService::require($party !== null, 'You have no active party.');
        $party = DB::table('parties')->where('id', $party->id)->lockForUpdate()->first();
        abort_if($owner && $party->owner_id !== $actor->id, 403);

        return $party;
    }

    public function cancelWaiting(object $party): void
    {
        SocialService::require($party->state !== 'offered', 'Respond to your match offer before changing this party.');
        if ($party->state === 'waiting') {
            DB::table('queue_entries')->where(['party_id' => $party->id, 'state' => 'waiting'])->update(['state' => 'cancelled', 'updated_at' => now()]);
            DB::table('parties')->where('id', $party->id)->update(['state' => 'idle', 'updated_at' => now()]);
        }
    }

    public function clearReadiness(int $partyId): void
    {
        DB::table('party_memberships')->where('party_id', $partyId)->whereNull('left_at')->update(['ready' => false]);
        DB::table('parties')->where('id', $partyId)->increment('version');
    }

    public function invite(User $actor, string $handle): void
    {
        MembershipTransaction::run(function () use ($actor, $handle) {
            $party = $this->locked($actor, true);
            SocialService::require($party->state === 'idle', 'Cancel the queue before inviting someone.');
            $other = User::where('handle', strtolower(trim($handle)))->first();
            SocialService::require($other && app(SocialService::class)->areFriends($actor->id, $other->id), 'Invite an accepted friend using their exact handle.');
            SocialService::require(! DB::table('active_participations')->where('user_id', $other->id)->exists(), 'That player already has an active party or session.');
            SocialService::require(DB::table('party_memberships')->where('party_id', $party->id)->whereNull('left_at')->count() < 5, 'This party is full.');
            DB::table('party_invitations')->updateOrInsert(['party_id' => $party->id, 'recipient_id' => $other->id], ['state' => 'pending', 'created_at' => now(), 'updated_at' => now()]);
        });
    }

    public function invitation(User $actor, int $invitationId, string $action): void
    {
        MembershipTransaction::run(function () use ($actor, $invitationId, $action) {
            $invite = DB::table('party_invitations')->where('id', $invitationId)->lockForUpdate()->first();
            abort_unless($invite, 404);
            $party = DB::table('parties')->where('id', $invite->party_id)->lockForUpdate()->first();
            abort_unless($action === 'revoke' ? $party->owner_id === $actor->id : $invite->recipient_id === $actor->id, 403);
            SocialService::require(in_array($action, ['accept', 'decline', 'revoke']) && $invite->state === 'pending', 'That invitation has changed.');
            if ($action === 'accept') {
                DB::table('users')->where('id', $actor->id)->lockForUpdate()->first();
                SocialService::require($party->state === 'idle' && app(SocialService::class)->areFriends($party->owner_id, $actor->id), 'That party invitation is no longer available.');
                SocialService::require(! DB::table('active_participations')->where('user_id', $actor->id)->exists(), 'Leave your current party or session first.');
                SocialService::require(DB::table('party_memberships')->where('party_id', $party->id)->whereNull('left_at')->count() < 5, 'This party is full.');
                DB::table('party_memberships')->insert(['party_id' => $party->id, 'user_id' => $actor->id, 'joined_at' => now()]);
                DB::table('active_participations')->insert(['party_id' => $party->id, 'user_id' => $actor->id]);
                $this->clearReadiness($party->id);
            }
            DB::table('party_invitations')->where('id', $invite->id)->update(['state' => $action === 'accept' ? 'accepted' : ($action === 'decline' ? 'declined' : 'revoked'), 'updated_at' => now()]);
        });
    }

    public function leave(User $actor): void
    {
        MembershipTransaction::run(function () use ($actor) {
            $party = $this->locked($actor);
            $this->cancelWaiting($party);
            $members = DB::table('party_memberships')->where('party_id', $party->id)->whereNull('left_at');
            $slots = DB::table('active_participations')->where('party_id', $party->id);
            if ($party->owner_id !== $actor->id) {
                $members->where('user_id', $actor->id);
                $slots->where('user_id', $actor->id);
            }
            $members->update(['left_at' => now(), 'ready' => false]);
            $slots->delete(); // Disposable current slot, never business membership history.
            $this->clearReadiness($party->id);
            if ($party->owner_id === $actor->id) {
                DB::table('parties')->where('id', $party->id)->update(['state' => 'disbanded', 'updated_at' => now()]);
                DB::table('party_invitations')->where('party_id', $party->id)->where('state', 'pending')->update(['state' => 'revoked', 'updated_at' => now()]);
            }
        });
    }

    public function settings(User $actor, string $shard, string $language): void
    {
        MembershipTransaction::run(function () use ($actor, $shard, $language) {
            validator(compact('shard', 'language'), ['shard' => 'required|in:'.implode(',', array_keys(Valorant::SHARDS)), 'language' => 'required|in:'.implode(',', array_keys(Valorant::LANGUAGES))])->validate();
            $party = $this->locked($actor, true);
            $this->cancelWaiting($party);
            DB::table('parties')->where('id', $party->id)->update(compact('shard', 'language') + ['updated_at' => now()]);
            $this->clearReadiness($party->id);
        });
    }

    public function ready(User $actor): void
    {
        MembershipTransaction::run(function () use ($actor) {
            $party = $this->locked($actor);
            SocialService::require($party->state === 'idle', 'Cancel the queue before changing readiness.');
            $actor->refresh();
            SocialService::require($actor->stated_rank && $actor->riot_id && $actor->competitive_access && $actor->shard === $party->shard && $actor->language === $party->language, 'Complete your declared game profile with a placed rank, Competitive access and the party shard/language first.');
            DB::table('party_memberships')->where(['party_id' => $party->id, 'user_id' => $actor->id])->whereNull('left_at')->update(['ready' => true]);
        });
    }
}
