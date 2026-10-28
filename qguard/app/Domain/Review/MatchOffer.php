<?php

namespace App\Domain\Review;

use App\Domain\Matching\Matcher;
use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

final class MatchOffer
{
    public function reserve(array $entries): int
    {
        $id = DB::table('match_offers')->insertGetId(['deadline' => now()->addSeconds(20), 'created_at' => now()]);
        foreach ($entries as $entry) {
            DB::table('queue_entries')->where('id', $entry->id)->update(['state' => 'offered', 'search_cursor' => null, 'updated_at' => now()]);
            DB::table('parties')->where('id', $entry->party_id)->update(['state' => 'offered', 'updated_at' => now()]);
            foreach ($entry->members as $userId) {
                DB::table('match_offer_members')->insert(['offer_id' => $id, 'queue_entry_id' => $entry->id, 'user_id' => $userId]);
            }
        }

        return $id;
    }

    public function respond(User $actor, int $id, bool $accepted): void
    {
        MembershipTransaction::run(function () use ($actor, $id, $accepted) {
            abort_unless($actor->hasVerifiedEmail(), 403);
            $offer = DB::table('match_offers')->where('id', $id)->lockForUpdate()->first();
            $member = DB::table('match_offer_members')->where(['offer_id' => $id, 'user_id' => $actor->id])->first();
            abort_unless($offer && $member, 403);
            if ($offer->state !== 'pending') {
                return;
            }
            if (now()->gte(Carbon::parse($offer->deadline))) {
                $this->resolve($id);

                return;
            }
            SocialService::require($member->accepted === null || $member->accepted === $accepted, 'Your response is already recorded.');
            if ($member->accepted === null) {
                DB::table('match_offer_members')->where('id', $member->id)->update(['accepted' => $accepted, 'responded_at' => now()]);
            }
            if (DB::table('match_offer_members')->where(['offer_id' => $id, 'accepted' => true])->count() === 5) {
                $this->resolve($id);
            }
        });
    }

    public function due(): void
    {
        foreach (DB::table('match_offers')->where('state', 'pending')->where('deadline', '<=', now())->pluck('id') as $id) {
            MembershipTransaction::run(fn () => $this->resolve($id));
        }
    }

    private function resolve(int $id): void
    {
        $offer = DB::table('match_offers')->where('id', $id)->lockForUpdate()->first();
        if ($offer->state !== 'pending') {
            return;
        }
        $members = DB::table('match_offer_members')->where('offer_id', $id)->get();
        $accepted = $members->count() === 5 && $members->every(fn ($m) => $m->accepted === true);
        if (! $accepted && now()->lt(Carbon::parse($offer->deadline))) {
            return;
        }
        $entries = DB::table('queue_entries')->whereIn('id', $members->pluck('queue_entry_id'))->orderBy('id')->lockForUpdate()->get();
        if ($accepted) {
            foreach ($entries as $entry) {
                $entry->members = json_decode($entry->roster, true);
            }
            $sessionId = app(Matcher::class)->activate($entries->all(), 'review-v2');
        } else {
            foreach ($entries as $entry) {
                $return = $members->where('queue_entry_id', $entry->id)->every(fn ($m) => $m->accepted === true);
                DB::table('queue_entries')->where('id', $entry->id)->update(['state' => $return ? 'waiting' : 'acceptance_failed', 'search_cursor' => null, 'updated_at' => now()]);
                DB::table('parties')->where('id', $entry->party_id)->update(['state' => $return ? 'waiting' : 'idle', 'updated_at' => now()]);
                if (! $return) {
                    DB::table('party_memberships')->where('party_id', $entry->party_id)->whereNull('left_at')->update(['ready' => false]);
                }
            }
        }
        DB::table('match_offers')->where('id', $id)->update(['state' => $accepted ? 'accepted' : 'failed', 'game_session_id' => $sessionId ?? null, 'resolved_at' => now()]);
    }

    public function current(User $actor): ?object
    {
        abort_unless($actor->hasVerifiedEmail(), 403);

        return DB::table('match_offers as o')->join('match_offer_members as m', 'm.offer_id', '=', 'o.id')->where('m.user_id', $actor->id)->where('o.state', 'pending')->first(['o.id', 'o.deadline', 'm.accepted']);
    }
}
