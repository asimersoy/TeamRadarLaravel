<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

it('serializes simultaneous party creation on separate PostgreSQL connections', function () {
    $user = User::factory()->readyPlayer()->create();
    $processes = [new Process([PHP_BINARY, base_path('tests/Support/race.php'), (string) $user->id]), new Process([PHP_BINARY, base_path('tests/Support/race.php'), (string) $user->id])];
    foreach ($processes as $process) {
        $process->start();
    }
    $outputs = [];
    foreach ($processes as $process) {
        $process->wait();
        expect($process->isSuccessful())->toBeTrue($process->getErrorOutput());
        $outputs[] = $process->getOutput();
    }
    sort($outputs);
    expect($outputs)->toBe(['conflict', 'created']);
    expect(DB::table('active_participations')->where('user_id', $user->id)->count())->toBe(1);
});
