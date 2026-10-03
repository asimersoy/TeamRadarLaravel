<?php

use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
$fixtures = json_decode(file_get_contents(storage_path('app/private/demo-credentials.json')), true, flags: JSON_THROW_ON_ERROR);
$user = User::where('handle', 'demo_a')->firstOrFail();
throw_unless($user->is_synthetic && $user->email === $fixtures['a']['email'], LogicException::class, 'Only the designated synthetic password-test account.');
$user->forceFill(['password' => $fixtures['a']['password']])->save();
echo 'Restored only the isolated synthetic password-test credential.'.PHP_EOL;
