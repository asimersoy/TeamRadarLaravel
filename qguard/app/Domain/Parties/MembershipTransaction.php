<?php

namespace App\Domain\Parties;

use Closure;
use Illuminate\Support\Facades\DB;

final class MembershipTransaction
{
    public static function run(Closure $command): mixed
    {
        return DB::transaction(function () use ($command) {
            // Initial single-instance correctness fence shared with matching. It
            // supplements row locks/constraints and is released even after a crash.
            DB::select('select pg_advisory_xact_lock(?)', [713401]);

            return $command();
        }, 3);
    }
}
