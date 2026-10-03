<?php

use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Tests\Support\Fixtures;

it('keeps concurrent matcher and cancellation atomic across independent processes', function () {
    $parties = array_map(fn () => Fixtures::party(1, ['language' => 'ja']), range(1, 5));
    $processes = [new Process([PHP_BINARY, base_path('tests/Support/matcher-race.php'), 'match']), new Process([PHP_BINARY, base_path('tests/Support/matcher-race.php'), 'match']), new Process([PHP_BINARY, base_path('tests/Support/matcher-race.php'), 'cancel', (string) $parties[0]['users'][0]->id])];
    foreach ($processes as $p) {
        $p->start();
    }foreach ($processes as $p) {
        $p->wait();
        expect($p->isSuccessful())->toBeTrue($p->getErrorOutput());
    }
    $ids = collect($parties)->flatMap(fn ($p) => $p['users']->pluck('id'));
    $participants = DB::table('session_participants')->whereIn('user_id', $ids)->count();
    expect(in_array($participants, [0, 5]))->toBeTrue()->and(DB::table('active_participations')->whereIn('user_id', $ids)->count())->toBe(5);
    expect(DB::table('active_participations')->whereIn('user_id', $ids)->whereNotNull('game_session_id')->count())->toBe($participants);
});
