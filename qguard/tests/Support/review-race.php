<?php

use App\Domain\Review\MatchOffer;
use App\Domain\Review\ReviewFeedback;
use App\Domain\Review\ReviewSession;
use App\Models\User;
use App\Support\EnvironmentSafety;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Carbon;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
EnvironmentSafety::assertDisposableTestDatabase();
config(['qguard.review_test_engine' => true]);
if (isset($argv[5])) {
    Carbon::setTestNow(Carbon::parse($argv[5]));
}
$user = User::findOrFail($argv[3]);
$id = (int) $argv[2];
$target = (int) $argv[4];
match ($argv[1]) {
    'submit' => app(ReviewFeedback::class)->submit($user, $id, $target, ['overall' => 10, 'communication' => 100]),
    'report' => app(ReviewFeedback::class)->report($user, $id, $target, 'harmful_language'),
    'end' => app(ReviewSession::class)->end($user, $id),
    'deadline' => app(ReviewSession::class)->due(),
    'accept' => app(MatchOffer::class)->respond($user, $id, true),
    'offer-deadline' => app(MatchOffer::class)->due(),
};
echo 'ok';
