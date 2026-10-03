<?php

namespace App\Domain\Matching;

use App\Domain\Parties\MembershipTransaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

final class Matcher
{
    public function tick(): array
    {
        $lease = Cache::lock('qguard-matcher', 30);
        if (! $lease->get()) {
            return ['status' => 'leased', 'matched' => 0, 'expansions' => 0];
        }
        try {
            return MembershipTransaction::run(function () {
                $matched = 0;
                $budget = (int) config('matching.tick_budget');
                $initialBudget = $budget;
                $buckets = DB::table('queue_entries')->where('state', 'waiting')->select('shard', 'language', 'mode')->distinct()->get();
                foreach ($buckets as $bucket) {
                    $base = DB::table('queue_entries')->where('state', 'waiting')->where((array) $bucket);
                    $key = implode(':', (array) $bucket);
                    $cursor = (int) DB::table('matcher_progress')->where('bucket', $key)->value('anchor_cursor');
                    $oldest = (clone $base)->orderBy('id')->value('id');
                    $anchors = (clone $base)->where('id', '>', $cursor)->orderBy('id')->limit((int) config('matching.anchors_per_tick') - 1)->pluck('id')->all();
                    if (! $anchors) {
                        $cursor = 0;
                        $anchors = (clone $base)->orderBy('id')->limit((int) config('matching.anchors_per_tick') - 1)->pluck('id')->all();
                    }
                    $anchors = array_unique(array_filter(array_merge([$oldest], $anchors)));
                    foreach ($anchors as $id) {
                        if ($budget <= 0) {
                            break;
                        }
                        $anchor = DB::table('queue_entries')->where(['id' => $id, 'state' => 'waiting'])->lockForUpdate()->first();
                        if (! $anchor) {
                            continue;
                        }
                        $cursor = max($cursor, $id);
                        $chosen = $this->search($anchor, $budget);
                        if ($chosen) {
                            $this->createSession($chosen);
                            $matched++;
                        }
                    }
                    DB::table('matcher_progress')->updateOrInsert(['bucket' => $key], ['anchor_cursor' => $cursor, 'created_at' => now(), 'updated_at' => now()]);
                }

                return ['status' => $budget === 0 ? 'budget_exhausted' : 'scanned', 'matched' => $matched, 'expansions' => $initialBudget - $budget];
            });
        } finally {
            $lease->release();
        }
    }

    public function allowance(object $entry): float
    {
        return min((float) config('matching.maximum_honor_span'), (float) config('matching.initial_honor_span') + floor(max(0, Carbon::parse($entry->queued_at)->diffInSeconds(now())) / (int) config('matching.widening_seconds')) * (float) config('matching.widening_step'));
    }

    private function search(object $anchor, int &$budget): ?array
    {
        $cursor = $anchor->search_cursor ? json_decode($anchor->search_cursor, true) : ['after' => 0];
        if (empty($cursor['ids'])) {
            $ids = DB::table('queue_entries')->where(['state' => 'waiting', 'shard' => $anchor->shard, 'language' => $anchor->language, 'mode' => $anchor->mode])->where('id', '!=', $anchor->id)->where('id', '>', $cursor['after'])->orderBy('id')->limit((int) config('matching.candidate_page_size'))->pluck('id')->all();
            $cursor = ['after' => $cursor['after'], 'ids' => $ids, 'stack' => [['chosen' => [], 'next' => 0]]];
        }
        $entries = DB::table('queue_entries')->whereIn('id', array_merge([$anchor->id], $cursor['ids']))->where('state', 'waiting')->lockForUpdate()->get()->keyBy('id');
        $userIds = [];
        foreach ($entries as $entry) {
            $entry->members = json_decode($entry->roster, true);
            $userIds = array_merge($userIds, $entry->members);
        }
        DB::table('honor_states')->whereIn('user_id', $userIds)->orderBy('user_id')->lockForUpdate()->get();
        $users = DB::table('users as u')->join('honor_states as h', 'h.user_id', '=', 'u.id')->whereIn('u.id', $userIds)->get(['u.*', 'h.honor_score'])->keyBy('id');
        $parties = DB::table('parties')->whereIn('id', $entries->pluck('party_id'))->lockForUpdate()->get()->keyBy('id');
        $slots = DB::table('active_participations')->whereIn('user_id', $userIds)->get()->keyBy('user_id');
        $ready = DB::table('party_memberships')->whereIn('party_id', $entries->pluck('party_id'))->whereNull('left_at')->get()->keyBy('user_id');
        foreach ($entries as $entry) {
            $party = $parties[$entry->party_id] ?? null;
            $entry->valid = $party && $party->state === 'waiting' && $party->version === $entry->party_version;
            foreach ($entry->members as $id) {
                $u = $users[$id] ?? null;
                $slot = $slots[$id] ?? null;
                $m = $ready[$id] ?? null;
                $entry->valid = $entry->valid && $u && $slot && $m && $slot->party_id === $entry->party_id && $m->party_id === $entry->party_id && $m->ready && $u->email_verified_at && $u->riot_id && $u->stated_rank && $u->competitive_access && $u->shard === $entry->shard && $u->language === $entry->language;
            }
        }
        $anchor = $entries[$anchor->id];
        $best = null;
        $bestScore = null;
        $used = 0;
        while ($cursor['stack'] && $budget > 0 && $used < (int) config('matching.anchor_budget')) {
            $node = array_pop($cursor['stack']);
            $used++;
            $budget--;
            $chosen = [$anchor];
            $size = count($anchor->members);
            foreach ($node['chosen'] as $index) {
                $entry = $entries[$cursor['ids'][$index]] ?? null;
                if (! $entry) {
                    $size = 99;
                    break;
                }$chosen[] = $entry;
                $size += count($entry->members);
            }
            if ($size > 5) {
                continue;
            }
            if ($size === 5) {
                $score = $this->score($chosen, $users);
                if ($score !== null && ($bestScore === null || $score < $bestScore)) {
                    $best = $chosen;
                    $bestScore = $score;
                }

                continue;
            }
            for ($i = count($cursor['ids']) - 1; $i >= $node['next']; $i--) {
                $entry = $entries[$cursor['ids'][$i]] ?? null;
                if ($entry && $size + count($entry->members) <= 5) {
                    $cursor['stack'][] = ['chosen' => array_merge($node['chosen'], [$i]), 'next' => $i + 1];
                }
            }
        }
        if ($best) {
            return $best;
        }
        $status = $cursor['stack'] ? 'budget_exhausted' : 'no_feasible_in_page';
        if (! $cursor['stack']) {
            $last = $cursor['ids'] ? max($cursor['ids']) : 0;
            $cursor = ['after' => count($cursor['ids']) >= (int) config('matching.candidate_page_size') ? $last : 0];
        }
        DB::table('queue_entries')->where('id', $anchor->id)->update(['search_cursor' => json_encode($cursor), 'search_status' => $status, 'updated_at' => now()]);

        return null;
    }

    private function score(array $entries, $users): ?array
    {
        $members = [];
        $scores = [];
        $ranks = [];
        $wait = 0;
        foreach ($entries as $entry) {
            if (! $entry->valid) {
                return null;
            }
            foreach ($entry->members as $id) {
                $u = $users[$id] ?? null;
                if (! $u || isset($members[$id])) {
                    return null;
                }
                $members[$id] = true;
                $scores[] = (float) $u->honor_score;
                $ranks[] = (int) $u->stated_rank;
            }
            $wait -= max(0, Carbon::parse($entry->queued_at)->diffInSeconds(now()));
        }
        if (count($members) !== 5) {
            return null;
        }
        $span = max($scores) - min($scores);
        foreach ($entries as $entry) {
            if ($span > $this->allowance($entry)) {
                return null;
            }
        }

        $ids = array_map(fn ($e) => $e->id, $entries);
        sort($ids);

        return [$span, max($ranks) - min($ranks), $wait, $ids];
    }

    private function createSession(array $entries): void
    {
        usort($entries, fn ($a, $b) => $a->id <=> $b->id);
        $first = $entries[0];
        $id = DB::table('game_sessions')->insertGetId(['shard' => $first->shard, 'language' => $first->language, 'mode' => $first->mode, 'coordinator_id' => min($first->members), 'created_at' => now(), 'updated_at' => now()]);
        foreach ($entries as $entry) {
            foreach ($entry->members as $userId) {
                $u = DB::table('users as u')->join('honor_states as h', 'h.user_id', '=', 'u.id')->where('u.id', $userId)->first(['u.*', 'h.honor_score']);
                DB::table('session_participants')->insert(['game_session_id' => $id, 'user_id' => $userId, 'origin_party_id' => $entry->party_id, 'handle' => $u->handle, 'riot_id' => $u->riot_id, 'rank_snapshot' => $u->stated_rank, 'honor_snapshot' => $u->honor_score, 'created_at' => now(), 'updated_at' => now()]);
                DB::table('active_participations')->where(['user_id' => $userId, 'party_id' => $entry->party_id])->update(['party_id' => null, 'game_session_id' => $id]);
            }
            DB::table('party_memberships')->where('party_id', $entry->party_id)->whereNull('left_at')->update(['left_at' => now()]);
            DB::table('parties')->where('id', $entry->party_id)->update(['state' => 'matched', 'updated_at' => now()]);
            DB::table('party_invitations')->where(['party_id' => $entry->party_id, 'state' => 'pending'])->update(['state' => 'revoked', 'updated_at' => now()]);
            DB::table('queue_entries')->where('id', $entry->id)->update(['state' => 'matched', 'search_cursor' => null, 'updated_at' => now()]);
        }
    }
}
