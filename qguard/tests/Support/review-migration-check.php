<?php

use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
// Explicitly disposable target: prove upgrading a populated old schema, not only a blank schema.
$paths = array_map(fn ($p) => str_replace(base_path().'/', '', $p), glob(database_path('migrations/*')));
$old = array_values(array_filter($paths, fn ($p) => ! str_contains($p, '2026_10_28')));
Artisan::call('migrate:fresh', ['--path' => $old, '--force' => true]);
$u = User::factory()->readyPlayer()->create();
DB::table('honor_states')->where('user_id', $u->id)->update(['honor_score' => 73.12345678]);
$before = DB::table('honor_states')->where('user_id', $u->id)->first();
Artisan::call('migrate', ['--force' => true]);
$after = DB::table('honor_states')->where('user_id', $u->id)->first();
if ((array) $before !== (array) $after) {
    throw new RuntimeException('Existing honor changed');
}
Artisan::call('migrate', ['--force' => true]);
if (! str_contains(Artisan::output(), 'Nothing to migrate')) {
    throw new RuntimeException('Migration not idempotent');
}
echo 'Populated historical schema upgraded; existing user/honor preserved; rerun no-op.'.PHP_EOL;
