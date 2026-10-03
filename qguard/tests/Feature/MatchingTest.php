<?php

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Livewire\Dashboard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);

it('matches whole parties into exactly five unique participants', function (array $sizes) {
    $s = Fixtures::session($sizes);
    expect($s['id'])->not->toBeNull();
    $members = DB::table('session_participants')->where('game_session_id', $s['id'])->get();
    expect($members)->toHaveCount(5)->and($members->pluck('user_id')->unique())->toHaveCount(5)->and($members->pluck('origin_party_id')->unique())->toHaveCount(count($sizes));
    expect(DB::table('active_participations')->whereNotNull('party_id')->count())->toBe(0);
})->with([[[4, 1]], [[3, 2]], [[2, 2, 1]], [[1, 1, 1, 1, 1]], [[5]]]);

it('allows wide rank disparity for a complete five but never mixes shards or languages', function () {
    Fixtures::party(4, ['stated_rank' => 1]);
    $other = Fixtures::party(1, ['stated_rank' => 25, 'language' => 'tr']);
    expect(app(Matcher::class)->tick()['matched'])->toBe(0);
    Fixtures::party(1, ['stated_rank' => 25, 'shard' => 'na']);
    expect(app(Matcher::class)->tick()['matched'])->toBe(0);
    Fixtures::party(1, ['stated_rank' => 25]);
    expect(app(Matcher::class)->tick()['matched'])->toBe(1);
    expect(DB::table('queue_entries')->find($other['entry']->id)->state)->toBe('waiting');
});

it('uses individual honor span and the wait allowance of every party', function () {
    $a = Fixtures::party(4);
    $b = Fixtures::party();
    DB::table('honor_states')->where('user_id', $a['users'][0]->id)->update(['honor_score' => 80]);
    DB::table('honor_states')->where('user_id', $a['users'][1]->id)->update(['honor_score' => 20]);
    DB::table('queue_entries')->where('party_id', $a['party'])->update(['queued_at' => now()->subMinutes(10)]);
    expect(app(Matcher::class)->tick()['matched'])->toBe(0);
    DB::table('queue_entries')->where('party_id', $b['party'])->update(['queued_at' => now()->subMinutes(10)]);
    expect(app(Matcher::class)->tick()['matched'])->toBe(1);
});

it('cancels on profile edit and never creates duplicate waiting entries', function () {
    $party = Fixtures::party();
    $user = $party['users'][0];
    app(QueueService::class)->enter($user);
    expect(DB::table('queue_entries')->where('state', 'waiting')->count())->toBe(1);
    Livewire::actingAs($user)->test(Dashboard::class)->set('rank', '11')->call('saveProfile')->assertHasNoErrors();
    expect(DB::table('queue_entries')->where('party_id', $party['party'])->value('state'))->toBe('cancelled')->and(DB::table('party_memberships')->where('party_id', $party['party'])->value('ready'))->toBeFalse();
});

it('continues beyond the first hundred candidates and records exhausted budgets', function () {
    $anchor = Fixtures::party(4);
    for ($i = 0; $i < 101; $i++) {
        Fixtures::party(2);
    }
    Fixtures::party(1);
    app(Matcher::class)->tick();
    app(Matcher::class)->tick();
    expect(DB::table('queue_entries')->find($anchor['entry']->id)->state)->toBe('matched');
    config(['matching.anchor_budget' => 1, 'matching.tick_budget' => 1]);
    app(Matcher::class)->tick();
    expect(DB::table('queue_entries')->where('search_status', 'budget_exhausted')->exists())->toBeTrue();
});

it('exposes only matched honor snapshots and denies outsiders', function () {
    $s = Fixtures::session();
    $a = $s['users'][0];
    $b = $s['users'][1];
    $outsider = User::factory()->create();
    DB::table('honor_states')->where('user_id', $b->id)->update(['honor_score' => 77]);
    $this->actingAs($a)->get('/rooms/'.$s['id'])->assertOk()->assertSee('Honor 50.0')->assertDontSee('Honor 77.0')->assertDontSee($b->email)->assertDontSee('smoothed_raw_rating_reference');
    $this->actingAs($outsider)->get('/rooms/'.$s['id'])->assertForbidden();
});
