<?php

namespace Tests\Unit;

use App\Support\EnvironmentSafety;
use LogicException;
use Tests\TestCase;

final class EnvironmentSafetyTest extends TestCase
{
    public function test_test_reset_requires_explicit_disposable_target(): void
    {
        EnvironmentSafety::assertDisposableTestDatabase();
        config(['qguard.disposable_test_database' => false]);
        $this->expectException(LogicException::class);
        EnvironmentSafety::assertDisposableTestDatabase();
    }

    public function test_test_reset_rejects_wrong_host(): void
    {
        config(['database.connections.pgsql.host' => 'production-db']);
        $this->expectException(LogicException::class);
        EnvironmentSafety::assertDisposableTestDatabase();
    }

    public function test_test_reset_rejects_production(): void
    {
        app()->detectEnvironment(fn () => 'production');
        $this->expectException(LogicException::class);
        EnvironmentSafety::assertDisposableTestDatabase();
    }
}
