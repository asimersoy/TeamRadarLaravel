<?php

use App\Domain\Sessions\SessionService;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
Carbon::setTestNow(Carbon::parse($argv[4]));
try {
    if ($argv[1] === 'ack') {
        app(SessionService::class)->acknowledge(User::findOrFail($argv[3]), (int) $argv[2]);
        echo 'ack';
    } else {
        echo app(SessionService::class)->deadlines();
    }
} catch (ValidationException|HttpException) {
    echo 'closed';
}
