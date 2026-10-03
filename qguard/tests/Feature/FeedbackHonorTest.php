<?php

use App\Domain\Feedback\AdminReview;
use App\Domain\Feedback\FeedbackService;
use App\Domain\Feedback\SettlementService;
use App\Domain\Honor\HonorCalculator;
use App\Domain\Sessions\SessionService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);
function endAll(array $s): void
{
    foreach ($s['users'] as $u) {
        app(SessionService::class)->end($u, $s['id']);
    }
}
function ratingRow(int $n = 8): array
{
    return ['communication' => $n, 'sportsmanship' => $n, 'effort' => $n];
}

it('keeps ratings pending and invalidates outgoing only for two distinct reporters across categories', function () {
    $s = Fixtures::session();
    endAll($s);
    [$a,$b,$c,$d,$e] = $s['users']->all();
    $f = app(FeedbackService::class);
    $f->finalize($a, $s['id'], [$b->id => ratingRow(1)]);
    expect(DB::table('honor_applications')->count())->toBe(0)->and(DB::table('game_sessions')->find($s['id'])->feedback_deadline)->not->toBeNull();
    $f->finalize($b, $s['id'], [$a->id => ratingRow(8) + ['early_leave' => true, 'harmful_language' => true]]);
    $f->finalize($c, $s['id'], [$a->id => ratingRow(9) + ['harmful_language' => true]]);
    $f->finalize($d, $s['id'], [], false, true);
    $f->finalize($e, $s['id'], [], false, true);
    expect(DB::table('honor_states')->where('user_id', $b->id)->value('eligible_rating_count'))->toBe(0)->and(DB::table('honor_states')->where('user_id', $a->id)->value('eligible_rating_count'))->toBe(2);
    expect(DB::table('honor_applications')->count())->toBe(2)->and(DB::table('behavior_ratings')->count())->toBe(3);
    expect(DB::table('moderation_cases')->value('automatic_invalidations'))->toContain('two_distinct_reporters');
    $f->finalize($a, $s['id'], []);
    app(SettlementService::class)->settle($s['id']);
    expect(DB::table('honor_applications')->count())->toBe(2);
});

it('does not count multiple flags by one reporter or rank discrepancies as two reports', function () {
    $s = Fixtures::session();
    endAll($s);
    [$a,$b,$c,$d,$e] = $s['users']->all();
    $f = app(FeedbackService::class);
    $f->finalize($a, $s['id'], [$b->id => ratingRow()]);
    $f->finalize($b, $s['id'], [$a->id => ['early_leave' => true, 'harmful_language' => true]]);
    $f->finalize($c, $s['id'], [$a->id => ['rank' => 'different']]);
    $f->finalize($d, $s['id'], [], false, true);
    $f->finalize($e, $s['id'], [], false, true);
    expect(DB::table('honor_states')->where('user_id', $b->id)->value('eligible_rating_count'))->toBe(1);
    expect(DB::table('rank_observations')->where('observation', 'different')->count())->toBe(1)->and(DB::table('moderation_cases')->value('automatic_invalidations'))->toBeNull();
});

it('forbids premade numeric ratings but lets premades and admitted leavers report', function () {
    $s = Fixtures::session([2, 1, 1, 1]);
    endAll($s);
    [$a,$b,$c,$d,$e] = $s['users']->all();
    $f = app(FeedbackService::class);
    expect(fn () => $f->finalize($a, $s['id'], [$b->id => ratingRow()]))->toThrow(ValidationException::class);
    $f->finalize($a, $s['id'], [$c->id => ratingRow() + ['early_leave' => true]], true);
    $f->finalize($b, $s['id'], [$c->id => ['harmful_language' => true]]);
    $f->finalize($c, $s['id'], [$d->id => ratingRow()]);
    $f->finalize($d, $s['id'], [], false, true);
    $f->finalize($e, $s['id'], [], false, true);
    expect(DB::table('honor_applications')->count())->toBe(0)->and(DB::table('conduct_reports')->count())->toBe(2);
    expect(DB::table('moderation_cases')->value('automatic_invalidations'))->toContain('self_admitted_early_leave')->toContain('two_distinct_reporters');
});

it('enforces deadline at request time and keeps late evidence out of settled honor', function () {
    $s = Fixtures::session();
    endAll($s);
    $f = app(FeedbackService::class);
    $a = $s['users'][0];
    $b = $s['users'][1];
    expect(DB::table('game_sessions')->find($s['id'])->feedback_deadline)->toBeNull();
    $f->finalize($a, $s['id'], [], false, true);
    $this->travel(10)->minutes();
    expect(fn () => $f->finalize($b, $s['id'], [$a->id => ratingRow()]))->toThrow(ValidationException::class);
    app(SettlementService::class)->settle($s['id']);
    $f->lateReport($b, $s['id'], $a->id, 'harmful_language', 'Late observed evidence');
    expect(DB::table('honor_applications')->count())->toBe(0)->and(DB::table('moderation_cases')->value('has_late_evidence'))->toBeTrue();
    expect(DB::table('honor_states')->where('eligible_rating_count', '>', 0)->count())->toBe(0);
});

it('rejects partial dimensions self rating and outsiders', function () {
    $s = Fixtures::session();
    endAll($s);
    $f = app(FeedbackService::class);
    $a = $s['users'][0];
    $b = $s['users'][1];
    expect(fn () => $f->finalize($a, $s['id'], [$b->id => ['communication' => 8]]))->toThrow(ValidationException::class);
    expect(fn () => $f->finalize($a, $s['id'], [$a->id => ratingRow()]))->toThrow(ValidationException::class);
    $this->actingAs(User::factory()->create())->get('/feedback/'.$s['id'])->assertForbidden();
    expect(DB::table('feedback_submissions')->count())->toBe(0);
});

it('uses canonical reviewer order independent of submission arrival', function () {
    $results = [];
    foreach ([[0, 1, 2, 3, 4], [4, 3, 2, 1, 0]] as $order) {
        $s = Fixtures::session();
        endAll($s);
        $a = $s['users'][0];
        foreach ($order as $i) {
            app(FeedbackService::class)->finalize($s['users'][$i], $s['id'], $i === 0 ? [] : [$a->id => ratingRow([0, 2, 5, 8, 10][$i])]);
        }$results[] = DB::table('honor_states')->where('user_id', $a->id)->first(['honor_score', 'smoothed_raw_rating_reference', 'eligible_rating_count']);
    }
    expect($results[0])->toEqual($results[1]);
});

it('rolls back a failed multi-recipient settlement and retries without duplicate effects', function () {
    $s = Fixtures::session();
    endAll($s);
    $a = $s['users'][0];
    app(FeedbackService::class)->finalize($a, $s['id'], [$s['users'][1]->id => ratingRow(), $s['users'][2]->id => ratingRow()]);
    $this->travel(10)->minutes();
    app()->bind(HonorCalculator::class, fn ($app, $p) => new class($p['settings']) extends HonorCalculator
    {
        private int $calls = 0;

        public function step(array $previous, float $new_input_teammate_behavior_rating): array
        {
            if (++$this->calls === 2) {
                throw new RuntimeException('Injected settlement interruption');
            }

            return parent::step($previous, $new_input_teammate_behavior_rating);
        }
    });
    expect(fn () => app(SettlementService::class)->settle($s['id']))->toThrow(RuntimeException::class);
    expect(DB::table('honor_applications')->count())->toBe(0)->and(DB::table('honor_settlements')->count())->toBe(0)->and(DB::table('honor_states')->where('eligible_rating_count', '>', 0)->count())->toBe(0);
    app()->bind(HonorCalculator::class, fn ($app, $p) => new HonorCalculator($p['settings']));
    app(SettlementService::class)->settle($s['id']);
    app(SettlementService::class)->settle($s['id']);
    expect(DB::table('honor_applications')->count())->toBe(2);
});

it('restricts full evidence to cleared admins, audits access and rejects stale reviews', function () {
    $s = Fixtures::session();
    endAll($s);
    $a = $s['users'][0];
    app(FeedbackService::class)->finalize($a, $s['id'], [$s['users'][1]->id => ['early_leave' => true, 'note' => 'Restricted case note']]);
    $case = DB::table('moderation_cases')->first();
    $this->actingAs($a)->get('/admin/cases/'.$case->id)->assertForbidden();
    $this->get('/feedback/'.$s['id'])->assertDontSee($a->email)->assertDontSee('Restricted case note');
    $admin = User::factory()->create(['admin_cleared' => true]);
    $this->actingAs($admin)->get('/admin/cases/'.$case->id)->assertOk()->assertSee($a->email)->assertSee('Restricted case note')->assertDontSee($a->password)->assertDontSee('remember_token');
    app(AdminReview::class)->review($admin, $case->id, $case->version, 'reviewed', 'Reviewed in test');
    expect(fn () => app(AdminReview::class)->review($admin, $case->id, $case->version, 'reviewed', 'Stale'))->toThrow(ValidationException::class);
    expect(DB::table('admin_access_events')->count())->toBeGreaterThanOrEqual(2);
});
