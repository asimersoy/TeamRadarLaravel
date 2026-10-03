<?php

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Tests\Support\Fixtures;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
set_exception_handler(function ($e) {
    fwrite(STDERR, $e->getMessage().PHP_EOL);
    exit(1);
});
EnvironmentSafety::assertDisposableTestDatabase();
config(['broadcasting.default' => 'null']);

throw_if(DB::table('queue_entries')->where('state', 'waiting')->exists(), LogicException::class, 'Stop test workers and use a quiescent test target.');
$setup = microtime(true);
$rooms = [];
for ($i = 0; $i < 10; $i++) {
    $rooms[] = Fixtures::session();
}
$queued = [];
$patterns = [[4, 1], [3, 2], [2, 2, 1], [1, 1, 1, 1, 1], [5]];
for ($i = 0; $i < 20; $i++) {
    foreach ($patterns[$i % 5] as $size) {
        $queued[] = Fixtures::party($size);
    }
}
$setupMs = round((microtime(true) - $setup) * 1000, 2);
$queries = 0;
DB::listen(function () use (&$queries) {
    $queries++;
});
$start = microtime(true);
app(QueueService::class)->cancel($queued[0]['users'][0]);
app(QueueService::class)->enter($queued[0]['users'][0]);
$cancel = ['ms' => round((microtime(true) - $start) * 1000, 2), 'queries' => $queries];
$queries = 0;
$processes = [];
foreach ($rooms as $s) {
    $p = new Process([PHP_BINARY, __DIR__.'/load-room.php', (string) $s['id']]);
    $p->setTimeout(60);
    $p->start();
    $processes[] = $p;
}
$started = microtime(true);
$ticks = [];
for ($i = 0; $i < 100 && DB::table('queue_entries')->where('state', 'waiting')->exists(); $i++) {
    $ticks[] = app(Matcher::class)->tick();
    throw_if(microtime(true) - $started > 60, RuntimeException::class, 'Matching probe exceeded 60 seconds.');
}
$matching = ['ms' => round((microtime(true) - $started) * 1000, 2), 'queries' => $queries, 'ticks' => $ticks];
$workers = [];
foreach ($processes as $p) {
    $p->wait();
    throw_unless($p->isSuccessful(), RuntimeException::class, $p->getErrorOutput().$p->getOutput());
    $workers[] = json_decode($p->getOutput(), true, flags: JSON_THROW_ON_ERROR);
}
$ids = collect($queued)->flatMap(fn ($p) => $p['users']->pluck('id'))->all();
$matchedUsers = DB::table('session_participants')->whereIn('user_id', $ids)->count();
$waiting = DB::table('queue_entries')->where('state', 'waiting')->get();
$waitingIds = $waiting->flatMap(fn ($e) => json_decode($e->roster, true));
throw_unless(count($ids) === 100 && $matchedUsers + $waitingIds->count() === 100 && $waitingIds->unique()->count() === $waitingIds->count(), LogicException::class, 'Missing/duplicate queued participant.');
// Greedy best-current matches can leave an infeasible residue (e.g. only 2s/4s).
// Distinguish that from a feasible five starved by the bounded search.
$possible = [0 => true];
foreach ($waiting as $entry) {
    $size = count(json_decode($entry->roster, true));
    foreach (array_keys($possible) as $sum) {
        if ($sum + $size <= 5) {
            $possible[$sum + $size] = true;
        }
    }
}
throw_if(isset($possible[5]), LogicException::class, 'A size-feasible five remains after the probe budget.');
$sessionIds = DB::table('session_participants')->whereIn('user_id', $ids)->distinct()->pluck('game_session_id');
throw_unless($sessionIds->count() * 5 === $matchedUsers, LogicException::class, 'Unexpected session count.');
foreach ($sessionIds as $id) {
    throw_unless(DB::table('session_participants')->where('game_session_id', $id)->count() === 5, LogicException::class, 'Partial match.');
}
foreach ($rooms as $s) {
    throw_unless(DB::table('chat_messages')->where('game_session_id', $s['id'])->count() === 10, LogicException::class, 'Missing chat.');
    throw_unless(DB::table('honor_settlements')->where('game_session_id', $s['id'])->count() === 1, LogicException::class, 'Settlement integrity.');
}
echo json_encode(['fixture_setup_ms' => $setupMs, 'queued_users' => 100, 'matched_users' => $matchedUsers, 'waiting_users' => $waitingIds->count(), 'waiting_party_sizes' => $waiting->map(fn ($e) => count(json_decode($e->roster, true)))->all(), 'preexisting_concurrent_rooms' => 10, 'cancellation' => $cancel, 'matching' => $matching, 'workers' => $workers, 'integrity' => 'passed'], JSON_PRETTY_PRINT).PHP_EOL;
