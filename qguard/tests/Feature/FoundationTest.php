<?php

use App\Support\EnvironmentSafety;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

it('uses the isolated PostgreSQL database and database cache', function () {
    expect(DB::connection()->getDriverName())->toBe('pgsql');
    expect(DB::selectOne('select current_database() as name')->name)->toBe('qguard_test');
    Cache::store('database')->put('foundation-smoke', 'persisted', 30);
    expect(Cache::store('database')->get('foundation-smoke'))->toBe('persisted');
});

it('renders an honest foundation and refuses public use', function () {
    $this->get('/')->assertOk()->assertSee('Your next game.')->assertSee('Live game joining is not integrated');
    app()->detectEnvironment(fn () => 'production');
    $this->get('/')->assertStatus(503);
});

it('refuses an unsafe test database before reset', function () {
    config(['database.connections.pgsql.database' => 'qguard']);
    expect(fn () => EnvironmentSafety::assertDisposableTestDatabase())->toThrow(LogicException::class);
});
