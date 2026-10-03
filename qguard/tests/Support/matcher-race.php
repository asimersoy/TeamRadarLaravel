<?php

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Symfony\Component\HttpKernel\Exception\HttpException;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
try {
    if ($argv[1] === 'match') {
        echo json_encode(app(Matcher::class)->tick());
    } else {
        app(QueueService::class)->cancel(User::findOrFail($argv[2]));
        echo 'cancelled';
    }
} catch (HttpException $e) {
    if ($e->getStatusCode() !== 403) {
        throw $e;
    }echo 'already_matched';
}
