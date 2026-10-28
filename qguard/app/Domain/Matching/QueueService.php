<?php

namespace App\Domain\Matching;

use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use App\Models\User;
use App\Support\ReviewVersion;
use Illuminate\Support\Facades\DB;

final class QueueService
{
    public function enter(User $actor): void
    {
        SocialService::require(ReviewVersion::historicalEngineEnabled(), ReviewVersion::QUEUE_MESSAGE);
        MembershipTransaction::run(function () use ($actor) {
            $party = app(PartyService::class)->current($actor);
            abort_unless($party && $party->owner_id === $actor->id, 403);
            $party = DB::table('parties')->where('id', $party->id)->lockForUpdate()->first();
            if ($party->state === 'waiting') {
                return;
            }
            SocialService::require($party->state === 'idle', 'This party cannot queue now.');
            $members = DB::table('party_memberships as m')->join('users as u', 'u.id', '=', 'm.user_id')->where('m.party_id', $party->id)->whereNull('m.left_at')->orderBy('u.id')->get(['u.*', 'm.ready']);
            SocialService::require($members->count() >= 1 && $members->count() <= 5, 'A party needs 1–5 players.');
            foreach ($members as $member) {
                SocialService::require($member->ready && $member->email_verified_at && $member->stated_rank && $member->riot_id && $member->competitive_access && $member->shard === $party->shard && $member->language === $party->language, 'Every player must be ready with a placed rank, Competitive access and the same shard/language.');
            }
            DB::table('queue_entries')->insert(['party_id' => $party->id, 'party_version' => $party->version, 'shard' => $party->shard, 'language' => $party->language, 'roster' => json_encode($members->pluck('id')->all()), 'queued_at' => now(), 'created_at' => now(), 'updated_at' => now()]);
            DB::table('parties')->where('id', $party->id)->update(['state' => 'waiting', 'updated_at' => now()]);
        });
    }

    public function cancel(User $actor): void
    {
        MembershipTransaction::run(function () use ($actor) {
            $party = app(PartyService::class)->current($actor);
            abort_unless($party && $party->owner_id === $actor->id, 403);
            app(PartyService::class)->cancelWaiting($party);
        });
    }
}
