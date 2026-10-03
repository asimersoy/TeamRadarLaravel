<?php

use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\File;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
// Run only while test scheduler/worker are stopped, before starting a new suite.
File::ensureDirectoryExists(storage_path('app/private'));
File::put(storage_path('app/private/browser-clock.json'), json_encode(['offset_seconds' => 0]));
echo 'Private test clock reset.'.PHP_EOL;
