<?php

use App\Domain\Feedback\FeedbackService;
use App\Domain\Feedback\SettlementService;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
if (isset($argv[4])) {
    Carbon::setTestNow(Carbon::parse($argv[4]));
}
try {
    if ($argv[1] === 'settle') {
        echo app(SettlementService::class)->settle((int) $argv[2]);
    } else {
        $user = User::findOrFail($argv[3]);
        echo app(FeedbackService::class)->finalize($user, (int) $argv[2], [], false, true);
    }
} catch (ValidationException) {
    echo 'closed';
}
