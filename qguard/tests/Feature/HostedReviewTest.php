<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

it('serves the hosted fictional review without cookies, accounts or database sessions', function () {
    config(['qguard.hosted_review_only' => true, 'qguard.public_enabled' => false]);
    app()->detectEnvironment(fn () => 'production');

    $this->get('/')->assertRedirect('/guest#welcome')->assertHeader('X-Robots-Tag', 'noindex, nofollow, noarchive');
    $response = $this->get('/guest')->assertOk()->assertSee('Fictional data. No live services.')
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow, noarchive');
    expect($response->headers->getCookies())->toBe([]);
    expect($response->headers->get('Content-Security-Policy'))->toContain("connect-src 'none'", "form-action 'none'");
    foreach (['users', 'sessions', 'game_sessions', 'behavior_ratings', 'conduct_reports', 'queue_entries'] as $table) {
        expect(DB::table($table)->count())->toBe(0);
    }
    $this->get('/up')->assertOk();
});

it('blocks all application and mutation routes in hosted review even if public access is also enabled', function () {
    config(['qguard.hosted_review_only' => true, 'qguard.public_enabled' => true]);
    app()->detectEnvironment(fn () => 'production');

    foreach (['/register', '/login', '/dashboard', '/admin/cases', '/sessions', '/rooms/1'] as $path) {
        $this->get($path)->assertStatus(503);
    }
    foreach (['/', '/guest', '/register', '/livewire/update', '/broadcasting/auth', '/interface-language'] as $path) {
        $this->post($path)->assertStatus(503);
    }
    expect(DB::table('users')->count())->toBe(0);
    expect(DB::table('sessions')->count())->toBe(0);
});

it('keeps normal production closed when neither public nor hosted review is enabled', function () {
    config(['qguard.hosted_review_only' => false, 'qguard.public_enabled' => false]);
    app()->detectEnvironment(fn () => 'production');
    $this->get('/guest')->assertStatus(503);
});
