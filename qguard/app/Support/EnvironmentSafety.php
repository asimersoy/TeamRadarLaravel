<?php

namespace App\Support;

use LogicException;

final class EnvironmentSafety
{
    public static function assertDisposableTestDatabase(): void
    {
        if (! app()->environment('testing')
            || ! config('qguard.disposable_test_database')
            || config('database.default') !== 'pgsql'
            || config('database.connections.pgsql.host') !== 'postgres'
            || config('database.connections.pgsql.database') !== 'qguard_test'
            || config('database.connections.pgsql.username') !== 'qguard_test') {
            throw new LogicException('Refusing test reset outside the designated disposable PostgreSQL target.');
        }
    }
}
