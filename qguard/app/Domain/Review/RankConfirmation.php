<?php

namespace App\Domain\Review;

use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use App\Models\User;
use App\Support\ReviewVersion;
use Illuminate\Support\Facades\DB;

final class RankConfirmation
{
    public function confirm(User $actor, int $rank): void
    {
        // Provider observations are server-owned; this implementation exposes only
        // guarded synthetic declarations until the RSO/provider contract exists.
        SocialService::require(ReviewVersion::reviewEngineEnabled(), ReviewVersion::QUEUE_MESSAGE);
        validator(compact('rank'), ['rank' => 'required|integer|between:1,25'])->validate();
        MembershipTransaction::run(function () use ($actor, $rank) {
            $party = app(PartyService::class)->current($actor);
            SocialService::require($party && $party->state === 'idle', 'Use an idle party before confirming your rank.');
            SocialService::require(! app(ReviewFeedback::class)->debt($actor->id), 'Complete your previous session feedback first.');
            $actor->refresh();
            SocialService::require($actor->hasVerifiedEmail() && $actor->riot_id && $actor->competitive_access, 'Complete your game profile first.');
            DB::table('users')->where('id', $actor->id)->update(['stated_rank' => $rank]);
            DB::table('rank_confirmations')->insert(['user_id' => $actor->id, 'party_id' => $party->id, 'party_version' => $party->version, 'identity_snapshot' => $actor->riot_id, 'declared_rank' => $rank, 'confirmed_at' => now()]);
        });
    }
}
