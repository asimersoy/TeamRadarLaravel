<?php

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Domain\Review\MatchOffer;
use App\Domain\Review\ReviewFeedback;
use App\Domain\Review\ReviewSession;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Tests\Support\Fixtures;

function concurrentReviewCommands(array $commands): void
{
    $processes = array_map(fn ($args) => new Process(array_merge([PHP_BINARY, base_path('tests/Support/review-race.php')], array_map('strval', $args))), $commands);
    foreach ($processes as $p) {
        $p->start();
    }
    foreach ($processes as $p) {
        $p->wait();
        expect($p->isSuccessful())->toBeTrue($p->getErrorOutput());
    }
}
function concurrentReviewTeam(): array
{
    config(['qguard.review_test_engine' => true]);
    $parties = array_map(fn () => Fixtures::party(), range(1, 5));
    $users = collect($parties)->flatMap(fn ($p) => $p['users'])->values();
    app(Matcher::class)->tick();
    $offer = app(MatchOffer::class)->current($users[0]);
    foreach ($users as $u) {
        app(MatchOffer::class)->respond($u, $offer->id, true);
    }
    $id = DB::table('match_offers')->find($offer->id)->game_session_id;
    foreach ($users as $u) {
        app(SessionService::class)->acknowledge($u, $id);
    }

    return compact('users', 'id');
}
it('deduplicates concurrent immutable submissions on separate PostgreSQL connections', function () {
    $s = concurrentReviewTeam();
    [$a,$b,$c] = $s['users'];
    foreach ([$a, $b, $c] as $u) {
        app(ReviewSession::class)->end($u, $s['id']);
    }
    concurrentReviewCommands([['submit', $s['id'], $a->id, $b->id], ['submit', $s['id'], $a->id, $b->id]]);
    $card = DB::table('review_feedback_cards')->where(['game_session_id' => $s['id'], 'author_id' => $a->id, 'recipient_id' => $b->id])->value('id');
    expect(DB::table('review_score_applications')->where('card_id', $card)->count())->toBe(2)->and(DB::table('honor_states')->where('user_id', $b->id)->value('eligible_rating_count'))->toBe(1);
});
it('serializes threshold reports with numerical applications without reversal', function () {
    $s = concurrentReviewTeam();
    [$a,$b,$c,$d] = $s['users'];
    foreach ([$a, $b, $c] as $u) {
        app(ReviewSession::class)->end($u, $s['id']);
    }
    app(ReviewFeedback::class)->report($b, $s['id'], $a->id, 'harmful_language');
    concurrentReviewCommands([['submit', $s['id'], $a->id, $d->id], ['report', $s['id'], $c->id, $a->id]]);
    $card = DB::table('review_feedback_cards')->where(['game_session_id' => $s['id'], 'author_id' => $a->id, 'recipient_id' => $d->id])->value('id');
    $application = DB::table('review_score_applications')->where(['card_id' => $card, 'dimension' => 'honor'])->first();
    expect((float) DB::table('honor_states')->where('user_id', $d->id)->value('honor_score'))->toBe($application->exclusion_reason ? 50.0 : 52.5);
});
it('creates one set of obligations when the third end request races expiry', function () {
    $s = concurrentReviewTeam();
    [$a,$b,$c] = $s['users'];
    app(ReviewSession::class)->end($a, $s['id']);
    app(ReviewSession::class)->end($b, $s['id']);
    $deadline = DB::table('game_sessions')->find($s['id'])->end_deadline;
    concurrentReviewCommands([['end', $s['id'], $c->id, 0, $deadline], ['deadline', $s['id'], $a->id, 0, $deadline]]);
    expect(DB::table('review_feedback_cards')->where('game_session_id', $s['id'])->count())->toBe(20)->and(DB::table('active_participations')->where('game_session_id', $s['id'])->count())->toBe(0);
});
it('activates a reserved roster once when the final acceptance is retried concurrently', function () {
    config(['qguard.review_test_engine' => true]);
    $parties = array_map(fn () => Fixtures::party(), range(1, 5));
    $users = collect($parties)->flatMap(fn ($p) => $p['users'])->values();
    app(Matcher::class)->tick();
    $offer = app(MatchOffer::class)->current($users[0]);
    foreach ($users->take(4) as $user) {
        app(MatchOffer::class)->respond($user, $offer->id, true);
    }
    concurrentReviewCommands([['accept', $offer->id, $users[4]->id, 0], ['accept', $offer->id, $users[4]->id, 0]]);
    $session = DB::table('match_offers')->find($offer->id)->game_session_id;
    expect(DB::table('session_participants')->whereIn('user_id', $users->pluck('id'))->count())->toBe(5)
        ->and(DB::table('active_participations')->where('game_session_id', $session)->count())->toBe(5);
});
it('resolves once when a last acceptance races the exact offer deadline', function () {
    config(['qguard.review_test_engine' => true]);
    $parties = array_map(fn () => Fixtures::party(), range(1, 5));
    $users = collect($parties)->flatMap(fn ($p) => $p['users'])->values();
    app(Matcher::class)->tick();
    $offer = app(MatchOffer::class)->current($users[0]);
    foreach ($users->take(4) as $user) {
        app(MatchOffer::class)->respond($user, $offer->id, true);
    }
    concurrentReviewCommands([['accept', $offer->id, $users[4]->id, 0, $offer->deadline], ['offer-deadline', $offer->id, $users[4]->id, 0, $offer->deadline]]);
    expect(DB::table('match_offers')->find($offer->id)->state)->toBe('failed')
        ->and(DB::table('queue_entries')->whereIn('id', collect($parties)->pluck('entry.id'))->where('state', 'waiting')->count())->toBe(4)
        ->and(DB::table('session_participants')->whereIn('user_id', $users->pluck('id'))->count())->toBe(0);
    // These separate-connection fixtures commit; do not leave returned entries
    // competing with the following historical-engine concurrency scenarios.
    foreach ($users->take(4) as $user) {
        app(QueueService::class)->cancel($user);
    }
});
