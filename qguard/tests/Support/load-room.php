<?php

use App\Domain\Feedback\FeedbackService;
use App\Domain\Sessions\SessionService;
use App\Http\Controllers\ChatController;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
set_exception_handler(function ($e) {
    fwrite(STDERR, $e->getMessage().PHP_EOL);
    exit(1);
});
EnvironmentSafety::assertDisposableTestDatabase();
config(['broadcasting.default' => 'null']);
$id = (int) $argv[1];
$queries = 0;
DB::listen(function () use (&$queries) {
    $queries++;
});
$users = User::whereIn('id', DB::table('session_participants')->where('game_session_id', $id)->pluck('user_id'))->orderBy('id')->get();
throw_unless($users->count() === 5 && $users->every->is_synthetic, LogicException::class, 'Only synthetic five-player sessions.');
$start = microtime(true);
foreach (range(1, 10) as $n) {
    $request = Request::create('/rooms/'.$id.'/messages', 'POST', ['body' => 'Synthetic load message '.$n, 'client_message_id' => (string) Str::uuid()]);
    $request->setUserResolver(fn () => $users[0]);
    app(ChatController::class)->store($request, $id);
}
$chat = microtime(true) - $start;
$chatQueries = $queries;
$queries = 0;
$start = microtime(true);
foreach ($users as $u) {
    app(SessionService::class)->end($u, $id);
    $target = $users->first(fn ($other) => $other->id !== $u->id);
    app(FeedbackService::class)->finalize($u, $id, [$target->id => ['communication' => 8, 'sportsmanship' => 8, 'effort' => 8]]);
}
echo json_encode(['session' => $id, 'chat_ms' => round($chat * 1000, 2), 'chat_queries' => $chatQueries, 'settlement_ms' => round((microtime(true) - $start) * 1000, 2), 'settlement_queries' => $queries]);
