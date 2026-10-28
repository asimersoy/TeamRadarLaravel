<?php

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Livewire\Dashboard;
use App\Support\ReviewVersion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);

it('serves isolated guest review without creating business records or authenticating', function () {
    config(['qguard.first_pass_test_engine' => false]);
    $response = $this->get('/guest')->assertOk()->assertSee('Fictional data. No live services.');
    $this->assertGuest();
    foreach (['users', 'game_sessions', 'behavior_ratings', 'conduct_reports', 'queue_entries'] as $table) {
        expect(DB::table($table)->count())->toBe(0);
    }
    $policy = $response->headers->get('Content-Security-Policy');
    expect($policy)->toContain("connect-src 'none'", "form-action 'none'", "frame-ancestors 'none'");
    preg_match_all('/<script>(.*?)<\/script>/s', $response->getContent(), $scripts);
    foreach ($scripts[1] as $script) {
        expect($policy)->toContain("'sha256-".base64_encode(hash('sha256', $script, true))."'");
    }
    expect($response->getContent())->toContain('sessionStorage')->not->toContain('localStorage', 'csrf-token');
    $this->get('/login')->assertOk()->assertSee('Continue as guest');
    $this->get('/rooms/1')->assertRedirect('/login');
});

it('blocks direct queue calls and Livewire attempts despite a ready declared identity', function () {
    $fixture = Fixtures::party();
    app(QueueService::class)->cancel($fixture['users'][0]);
    config(['qguard.first_pass_test_engine' => false]);
    expect(fn () => app(QueueService::class)->enter($fixture['users'][0]))->toThrow(ValidationException::class);
    Livewire::actingAs($fixture['users'][0])->test(Dashboard::class)
        ->assertSee(ReviewVersion::QUEUE_MESSAGE)->call('enterQueue')->assertHasErrors();
    expect(DB::table('queue_entries')->where('state', 'waiting')->count())->toBe(0);
});

it('does not form sessions from retained waiting entries while Riot linking is unavailable', function () {
    Fixtures::party(5);
    config(['qguard.first_pass_test_engine' => false]);
    expect(app(Matcher::class)->tick())->toBe(['status' => 'awaiting_riot_linking', 'matched' => 0, 'expansions' => 0]);
    expect(DB::table('game_sessions')->count())->toBe(0);
    expect(DB::table('queue_entries')->where('state', 'waiting')->count())->toBe(1);
});

it('cannot enable the historical test engine in a normal environment or unsafe database', function () {
    config(['qguard.first_pass_test_engine' => true]);
    foreach (['local', 'production'] as $environment) {
        app()->detectEnvironment(fn () => $environment);
        expect(ReviewVersion::historicalEngineEnabled())->toBeFalse();
    }
    app()->detectEnvironment(fn () => 'testing');
    config(['database.connections.pgsql.database' => 'qguard']);
    expect(fn () => ReviewVersion::historicalEngineEnabled())->toThrow(LogicException::class);
});
