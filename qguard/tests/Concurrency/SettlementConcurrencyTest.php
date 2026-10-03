<?php

use App\Domain\Feedback\FeedbackService;
use App\Domain\Honor\HonorCalculator;
use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Domain\Parties\PartyService;
use App\Domain\Sessions\SessionService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Tests\Support\Fixtures;

it('serializes overlapping settlements and replays committed input order exactly', function () {
    $one = Fixtures::session();
    $shared = $one['users'][0];
    foreach ($one['users'] as $u) {
        app(SessionService::class)->end($u, $one['id']);
    }
    app(PartyService::class)->create($shared);
    app(PartyService::class)->ready($shared);
    app(QueueService::class)->enter($shared);
    $others = [];
    for ($i = 0; $i < 4; $i++) {
        $others[] = Fixtures::party();
    }app(Matcher::class)->tick();
    $twoId = DB::table('active_participations')->where('user_id', $shared->id)->value('game_session_id');
    $secondReviewer = $others[0]['users'][0];
    app(SessionService::class)->end($secondReviewer, $twoId);
    app(FeedbackService::class)->finalize($one['users'][1], $one['id'], [$shared->id => ['communication' => 2, 'sportsmanship' => 2, 'effort' => 2]]);
    app(FeedbackService::class)->finalize($secondReviewer, $twoId, [$shared->id => ['communication' => 9, 'sportsmanship' => 9, 'effort' => 9]]);
    DB::table('game_sessions')->whereIn('id', [$one['id'], $twoId])->update(['feedback_deadline' => now()->subSecond()]);
    $processes = [];
    foreach ([$one['id'], $twoId, $one['id']] as $id) {
        $processes[] = new Process([PHP_BINARY, base_path('tests/Support/settlement-race.php'), 'settle', (string) $id]);
    }
    foreach ($processes as $p) {
        $p->start();
    }foreach ($processes as $p) {
        $p->wait();
        expect($p->isSuccessful())->toBeTrue($p->getErrorOutput());
    }
    $applications = DB::table('honor_applications')->where('recipient_id', $shared->id)->orderBy('id')->get();
    expect($applications)->toHaveCount(2);
    $state = ['honor_score' => 50.0, 'smoothed_raw_rating_reference' => null, 'eligible_rating_count' => 0];
    $calculator = new HonorCalculator;
    foreach ($applications as $application) {
        expect(json_decode($application->before_state, true))->toEqual($state);
        $rating = DB::table('behavior_ratings')->find($application->rating_id);
        $state = $calculator->step($state, HonorCalculator::input([(int) $rating->communication, (int) $rating->sportsmanship, (int) $rating->effort]));
        expect(json_decode($application->after_state, true))->toEqual($state);
    }
    expect((float) DB::table('honor_states')->where('user_id', $shared->id)->value('honor_score'))->toBe($state['honor_score']);
});

it('keeps exact-deadline finalization closed even while a settlement races it', function () {
    $s = Fixtures::session();
    foreach ($s['users'] as $u) {
        app(SessionService::class)->end($u, $s['id']);
    }app(FeedbackService::class)->finalize($s['users'][0], $s['id'], [], false, true);
    $deadline = DB::table('game_sessions')->find($s['id'])->feedback_deadline;
    $processes = [new Process([PHP_BINARY, base_path('tests/Support/settlement-race.php'), 'finalize', (string) $s['id'], (string) $s['users'][1]->id, $deadline]), new Process([PHP_BINARY, base_path('tests/Support/settlement-race.php'), 'settle', (string) $s['id'], '0', $deadline])];
    foreach ($processes as $p) {
        $p->start();
    }foreach ($processes as $p) {
        $p->wait();
        expect($p->isSuccessful())->toBeTrue($p->getErrorOutput());
    }
    expect($processes[0]->getOutput())->toBe('closed')->and(DB::table('feedback_submissions')->where('game_session_id', $s['id'])->count())->toBe(1)->and(DB::table('honor_settlements')->where('game_session_id', $s['id'])->count())->toBe(1);
});
