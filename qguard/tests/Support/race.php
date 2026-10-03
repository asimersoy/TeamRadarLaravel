<?php

use App\Domain\Parties\PartyService;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Validation\ValidationException;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
try {
    app(PartyService::class)->create(User::findOrFail($argv[1]));
    echo 'created';
} catch (ValidationException) {
    echo 'conflict';
}
