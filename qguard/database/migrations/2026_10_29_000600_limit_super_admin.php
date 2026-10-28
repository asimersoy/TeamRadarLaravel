<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::table('users')->where('admin_cleared', true)->count() > 1) {
            throw new RuntimeException('Multiple cleared administrators exist. Resolve the owner assignment before migrating; no accounts were changed.');
        }

        DB::statement('CREATE UNIQUE INDEX users_one_super_admin ON users (admin_cleared) WHERE admin_cleared = true');
    }

    public function down(): void
    {
        DB::statement('DROP INDEX users_one_super_admin');
    }
};
