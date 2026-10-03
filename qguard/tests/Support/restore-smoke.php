<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
set_exception_handler(function ($e) {
    fwrite(STDERR, $e->getMessage().PHP_EOL);
    exit(1);
});
throw_unless(app()->environment('testing') && config('database.connections.pgsql.host') === 'postgres' && preg_match('/^qguard_restore_[a-z0-9_]+$/', config('database.connections.pgsql.database')), LogicException::class, 'Restore smoke requires a separate restored target.');
config(['session.driver' => 'array', 'broadcasting.default' => 'null']);
$p = DB::table('session_participants')->where('state', '!=', 'removed_no_show')->orderByDesc('id')->first();
throw_unless($p, LogicException::class, 'No restored session fixture.');
Auth::loginUsingId($p->user_id);
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
foreach (['/dashboard', '/rooms/'.$p->game_session_id, '/feedback/'.$p->game_session_id] as $path) {
    $request = Request::create('http://nginx'.$path);
    $response = $kernel->handle($request);
    throw_unless($response->getStatusCode() === 200, LogicException::class, 'Restored route failed: '.$path.' status '.$response->getStatusCode());
    echo $path.' 200'.PHP_EOL;
    $kernel->terminate($request, $response);
}
