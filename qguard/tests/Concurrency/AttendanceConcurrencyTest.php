<?php

use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Tests\Support\Fixtures;

it('linearizes a response started before deadline against deadline execution', function () {
    $s = Fixtures::session();
    $target = $s['users'][4];
    $deadline = now();
    DB::table('no_show_requests')->insert(['game_session_id' => $s['id'], 'target_id' => $target->id, 'state' => 'responding', 'response_deadline' => $deadline, 'created_at' => now(), 'updated_at' => now()]);
    $processes = [new Process([PHP_BINARY, base_path('tests/Support/no-show-race.php'), 'ack', (string) $s['id'], (string) $target->id, $deadline->copy()->subSecond()->toIso8601String()]), new Process([PHP_BINARY, base_path('tests/Support/no-show-race.php'), 'deadline', (string) $s['id'], (string) $target->id, $deadline->toIso8601String()])];
    foreach ($processes as $p) {
        $p->start();
    }foreach ($processes as $p) {
        $p->wait();
        expect($p->isSuccessful())->toBeTrue($p->getErrorOutput());
    }
    $state = DB::table('session_participants')->where(['game_session_id' => $s['id'], 'user_id' => $target->id])->value('state');
    expect(in_array($state, ['acknowledged', 'removed_no_show']))->toBeTrue();
    expect(DB::table('active_participations')->where('game_session_id', $s['id'])->count())->toBe($state === 'acknowledged' ? 5 : 0);
});
