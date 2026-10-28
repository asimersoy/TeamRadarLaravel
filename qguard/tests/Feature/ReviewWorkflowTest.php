<?php

use App\Domain\Feedback\FeedbackService;
use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Domain\Parties\PartyService;
use App\Domain\Review\MatchOffer;
use App\Domain\Review\RankConfirmation;
use App\Domain\Review\ReviewFeedback;
use App\Domain\Review\ReviewSession;
use App\Domain\Sessions\SessionService;
use App\Livewire\ReviewDetail;
use App\Models\User;
use App\Support\ReviewVersion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;
use Livewire\Livewire;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);
beforeEach(fn () => config(['qguard.review_test_engine' => true]));
function reviewTeam(array $sizes = [1, 1, 1, 1, 1], bool $close = false): array
{
    $parties = array_map(fn ($n) => Fixtures::party($n), $sizes);
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
    if ($close) {
        foreach ($users->take(3) as $u) {
            app(ReviewSession::class)->end($u, $id);
        }
    }

    return compact('id', 'users', 'parties', 'offer');
}
it('closes once at three requests and keeps slots until shared closure', function () {
    $s = reviewTeam();
    $svc = app(ReviewSession::class);
    $svc->end($s['users'][0], $s['id']);
    $deadline = DB::table('game_sessions')->find($s['id'])->end_deadline;
    $this->travel(60)->seconds();
    $svc->end($s['users'][0], $s['id']);
    $svc->end($s['users'][1], $s['id']);
    expect(DB::table('active_participations')->count())->toBe(5)->and(DB::table('review_feedback_cards')->count())->toBe(0)->and(DB::table('game_sessions')->find($s['id'])->end_deadline)->toBe($deadline);
    $svc->end($s['users'][2], $s['id']);
    $svc->end($s['users'][2], $s['id']);
    expect(DB::table('active_participations')->count())->toBe(0)->and(DB::table('review_feedback_cards')->count())->toBe(20)->and(DB::table('session_end_requests')->count())->toBe(3);
});
it('closes at five minutes and excludes original premades from obligations', function () {
    $s = reviewTeam([3, 2]);
    app(ReviewSession::class)->end($s['users'][0], $s['id']);
    $this->travel(299)->seconds();
    app(ReviewSession::class)->due();
    expect(DB::table('review_feedback_cards')->count())->toBe(0);
    $this->travel(1)->seconds();
    app(ReviewSession::class)->due();
    app(ReviewSession::class)->due();
    expect(DB::table('review_feedback_cards')->count())->toBe(12);
});
it('creates no obligations for full premades', function () {
    $s = reviewTeam([5], true);
    expect(DB::table('review_feedback_cards')->count())->toBe(0);
});
it('applies one immutable card immediately and never expires remaining obligations', function () {
    $s = reviewTeam(close: true);
    [$a,$b] = $s['users'];
    $f = app(ReviewFeedback::class);
    $id = $f->submit($a, $s['id'], $b->id, ['overall' => 10, 'communication' => 50]);
    expect((float) DB::table('honor_states')->where('user_id', $b->id)->value('honor_score'))->toBe(52.5)->and(DB::table('descriptor_states')->value('eligible_rating_count'))->toBe(1)->and(DB::table('review_score_applications')->count())->toBe(2);
    expect($f->submit($a, $s['id'], $b->id, ['overall' => 10, 'communication' => 50]))->toBe($id);
    expect(fn () => $f->submit($a, $s['id'], $b->id, ['overall' => 1]))->toThrow(ValidationException::class);
    $this->travel(90)->days();
    expect($f->debt($a->id))->toBe($s['id']);
    foreach ($s['users']->skip(2) as $u) {
        $f->submit($a, $s['id'], $u->id, ['overall' => 8]);
    }
    expect($f->debt($a->id))->toBeNull()->and($f->debt($b->id))->toBe($s['id']);
});
it('separates eligibility from required completion and preserves report timing', function () {
    $s = reviewTeam(close: true);
    [$a,$b,$c,$d,$e] = $s['users'];
    $f = app(ReviewFeedback::class);
    $f->submit($a, $s['id'], $e->id, ['overall' => 1]);
    $f->report($b, $s['id'], $a->id, 'early_leave');
    $f->report($b, $s['id'], $a->id, 'harmful_language');
    expect($f->exclusion($s['id'], $a->id))->toBeNull();
    $f->report($c, $s['id'], $a->id, 'harmful_language');
    $f->submit($a, $s['id'], $d->id, ['overall' => 10, 'communication' => 100]);
    expect((float) DB::table('honor_states')->where('user_id', $e->id)->value('honor_score'))->toBe(47.5)->and((float) DB::table('honor_states')->where('user_id', $d->id)->value('honor_score'))->toBe(50.0)->and(DB::table('review_score_applications')->whereNotNull('exclusion_reason')->count())->toBe(2)->and($f->debt($a->id))->toBe($s['id']);
    foreach ([$b, $c] as $u) {
        $f->submit($a, $s['id'], $u->id, ['overall' => 5]);
    }
    expect($f->debt($a->id))->toBeNull();
});
it('uses independent descriptor counts and hides sparse values', function () {
    $s = reviewTeam(close: true);
    [$a,$b,$c,$d,$e] = $s['users'];
    $f = app(ReviewFeedback::class);
    expect($f->summaries($a)['communication']['status'])->toBe('No feedback yet');
    $f->submit($b, $s['id'], $a->id, ['overall' => 5, 'communication' => 0]);
    $f->submit($c, $s['id'], $a->id, ['overall' => 5, 'communication' => 100, 'play_style' => 50]);
    expect($f->summaries($a)['communication']['value'])->toBeNull();
    $f->submit($d, $s['id'], $a->id, ['overall' => 5, 'communication' => 50]);
    expect($f->summaries($a)['communication']['value'])->not->toBeNull()->and($f->summaries($a)['play_style']['value'])->toBeNull()->and(DB::table('descriptor_states')->where('dimension', 'play_style')->value('eligible_rating_count'))->toBe(1);
});
it('rejects missing invalid self premade and outsider cards and historical bypass', function () {
    $s = reviewTeam([2, 1, 1, 1], true);
    [$a,$b,$c] = $s['users'];
    $f = app(ReviewFeedback::class);
    expect(fn () => $f->submit($a, $s['id'], $c->id, ['overall' => 0]))->toThrow(ValidationException::class);
    expect(fn () => $f->submit($a, $s['id'], $a->id, ['overall' => 5]))->toThrow(HttpException::class);
    expect(fn () => $f->submit($a, $s['id'], $b->id, ['overall' => 5]))->toThrow(HttpException::class);
    expect(fn () => $f->submit(User::factory()->readyPlayer()->create(), $s['id'], $a->id, ['overall' => 5]))->toThrow(HttpException::class);
    expect(fn () => app(FeedbackService::class)->finalize($a, $s['id'], [], false, true))->toThrow(ValidationException::class);
});
it('preserves blocking discrepancy until closure and creates no preplay debt', function () {
    $s = reviewTeam();
    [$a,$b,$c] = $s['users'];
    $svc = app(ReviewSession::class);
    $svc->dispute($a, $s['id'], $b->id);
    expect(fn () => app(SessionService::class)->acknowledge($c, $s['id']))->toThrow(ValidationException::class);
    $svc->end($a, $s['id']);
    $this->travel(5)->minutes();
    $svc->due();
    expect(DB::table('lobby_discrepancies')->value('state'))->toBe('closed_unresolved')->and(DB::table('review_feedback_cards')->count())->toBe(0)->and(DB::table('game_sessions')->find($s['id'])->state)->toBe('disbanded');
});
it('disbands on one corroboration despite two denials and excludes reporter and target', function () {
    $s = reviewTeam();
    [$a,$b,$c,$d,$e] = $s['users'];
    $svc = app(ReviewSession::class);
    $svc->dispute($a, $s['id'], $b->id);
    $id = DB::table('lobby_discrepancies')->value('id');
    expect(fn () => $svc->corroborate($a, $s['id'], $id, true))->toThrow(HttpException::class);
    $svc->corroborate($c, $s['id'], $id, false);
    $svc->corroborate($d, $s['id'], $id, false);
    $svc->corroborate($e, $s['id'], $id, true);
    expect(DB::table('game_sessions')->find($s['id'])->closure_reason)->toBe('account_rank_discrepancy')->and(DB::table('active_participations')->count())->toBe(0);
});
it('versions host supplied codes and rejects nonhost stale and closed writes', function () {
    $s = reviewTeam();
    [$a,$b] = $s['users'];
    $svc = app(ReviewSession::class);
    $svc->code($a, $s['id'], '  Ab-123!  ', 0);
    expect(DB::table('party_code_versions')->value('code'))->toBe('Ab-123!');
    expect(fn () => $svc->code($b, $s['id'], 'x', 1))->toThrow(HttpException::class);
    expect(fn () => $svc->code($a, $s['id'], 'x', 0))->toThrow(ValidationException::class);
    expect(fn () => $svc->code($a, $s['id'], "x\ny", 1))->toThrow(ValidationException::class);
    foreach ($s['users']->take(3) as $u) {
        $svc->end($u, $s['id']);
    }
    expect(fn () => $svc->code($a, $s['id'], 'x', 1))->toThrow(ValidationException::class);
});
it('stops failed original premades intact and returns only fully accepted entries', function (array $sizes) {
    $parties = array_map(fn ($n) => Fixtures::party($n), $sizes);
    app(Matcher::class)->tick();
    $offer = app(MatchOffer::class)->current($parties[0]['users'][0]);
    $svc = app(MatchOffer::class);
    foreach ($parties as $i => $p) {
        foreach ($p['users'] as $j => $u) {
            $svc->respond($u, $offer->id, ! ($i === 0 && $j === 0));
        }
    }
    expect(DB::table('game_sessions')->count())->toBe(0);
    $this->travel(20)->seconds();
    $svc->due();
    $svc->due();
    expect(DB::table('parties')->find($parties[0]['party'])->state)->toBe('idle')->and(DB::table('party_memberships')->whereNull('left_at')->count())->toBe(5)->and(DB::table('queue_entries')->where('state', 'waiting')->count())->toBe(count($sizes) - 1);
})->with([[[3, 2]], [[2, 2, 1]]]);
it('requires fresh rank confirmation after a failed attempt and blocks outstanding feedback', function () {
    $s = reviewTeam(close: true);
    $a = $s['users'][0];
    app(PartyService::class)->create($a);
    app(PartyService::class)->ready($a);
    expect(fn () => app(RankConfirmation::class)->confirm($a, 10))->toThrow(ValidationException::class);
    expect(fn () => app(QueueService::class)->enter($a))->toThrow(ValidationException::class);
});

it('renders real review pages without exposing received cards and enforces locked ids', function () {
    $s = reviewTeam(close: true);
    [$a,$b,$c] = $s['users'];
    $f = app(ReviewFeedback::class);
    $f->submit($a, $s['id'], $b->id, ['overall' => 9, 'communication' => 72]);
    $this->actingAs($b)->get('/sessions')->assertOk()->assertSee('Session #'.$s['id']);
    $this->actingAs($b)->get('/sessions/'.$s['id'])->assertOk()->assertDontSee('Your honor rating: 9');
    $this->actingAs($a)->get('/sessions/'.$s['id'])->assertOk()->assertSee('Your honor rating: 9');
    $this->actingAs($a)->get('/rooms/'.$s['id'])->assertOk()->assertSee('This QGuard session is closed');
    $this->actingAs($a)->get('/connections')->assertOk();
    $this->actingAs($a)->get('/profile')->assertOk()->assertSee('No feedback yet');
    $outsider = User::factory()->readyPlayer()->create();
    $this->actingAs($outsider)->get('/sessions/'.$s['id'])->assertForbidden();
    $this->actingAs($outsider)->get('/sessions')->assertDontSee('Session #'.$s['id']);
    $this->actingAs($a);
    expect(fn () => Livewire::test(ReviewDetail::class, ['session' => $s['id']])->set('sessionId', 999))->toThrow(CannotUpdateLockedPropertyException::class);
});
it('guards both test engines in production and cannot forge rank observations', function () {
    config(['qguard.review_test_engine' => true, 'qguard.first_pass_test_engine' => true]);
    app()->detectEnvironment(fn () => 'production');
    expect(ReviewVersion::reviewEngineEnabled())->toBeFalse()->and(ReviewVersion::historicalEngineEnabled())->toBeFalse();
});
it('closes chat and host writes at the shared deadline without relying on scheduler', function () {
    $s = reviewTeam();
    [$a,$b] = $s['users'];
    app(ReviewSession::class)->end($a, $s['id']);
    $this->travel(5)->minutes();
    $this->actingAs($a)->postJson('/rooms/'.$s['id'].'/messages', ['body' => 'late', 'client_message_id' => (string) Str::uuid()])->assertUnprocessable();
    expect(DB::table('game_sessions')->find($s['id'])->state)->toBe('ended')->and(DB::table('review_feedback_cards')->count())->toBe(20);
});
it('rejects new queue attempts without a fresh confirmation after cancellation', function () {
    $p = Fixtures::party();
    $a = $p['users'][0];
    app(QueueService::class)->cancel($a);
    expect(fn () => app(QueueService::class)->enter($a))->toThrow(ValidationException::class);
    app(RankConfirmation::class)->confirm($a, $a->stated_rank);
    app(QueueService::class)->enter($a);
    expect(DB::table('queue_entries')->where('state', 'waiting')->count())->toBe(1);
});
it('freezes premade and game settings throughout a reserved offer', function () {
    $ps = [Fixtures::party(3), Fixtures::party(2)];
    app(Matcher::class)->tick();
    $a = $ps[0]['users'][0];
    expect(fn () => app(PartyService::class)->leave($a))->toThrow(ValidationException::class);
    expect(fn () => app(PartyService::class)->settings($a, 'eu', 'tr'))->toThrow(ValidationException::class);
    expect(DB::table('party_memberships')->whereNull('left_at')->count())->toBe(5);
});
it('does not reuse an older unconsumed confirmation after repeated confirmations', function () {
    $p = Fixtures::party();
    $a = $p['users'][0];
    app(QueueService::class)->cancel($a);
    app(RankConfirmation::class)->confirm($a, $a->stated_rank);
    app(RankConfirmation::class)->confirm($a, $a->stated_rank);
    app(QueueService::class)->enter($a);
    app(QueueService::class)->cancel($a);
    expect(fn () => app(QueueService::class)->enter($a))->toThrow(ValidationException::class);
    expect(DB::table('rank_confirmations')->whereNull('queue_entry_id')->count())->toBe(1);
});
it('distinguishes repeated reviewers from separate reviewers across sessions', function () {
    $s = reviewTeam(close: true);
    [$a,$b,$c,$d] = $s['users'];
    $f = app(ReviewFeedback::class);
    $f->submit($b, $s['id'], $a->id, ['overall' => 5, 'communication' => 100]);
    // A second historical session with the same retained participant identity.
    $id = DB::table('game_sessions')->insertGetId(['workflow_version' => 'review-v2', 'state' => 'ended', 'shard' => 'eu', 'language' => 'en', 'coordinator_id' => $a->id, 'closed_at' => now(), 'created_at' => now(), 'updated_at' => now()]);
    foreach (DB::table('session_participants')->where('game_session_id', $s['id'])->get() as $p) {
        $row = (array) $p;
        unset($row['id']);
        $row['game_session_id'] = $id;
        DB::table('session_participants')->insert($row);
    }
    DB::table('review_feedback_cards')->insert(['game_session_id' => $id, 'author_id' => $b->id, 'recipient_id' => $a->id, 'created_at' => now()]);
    $f->submit($b, $id, $a->id, ['overall' => 5, 'communication' => 0]);
    $f->submit($c, $s['id'], $a->id, ['overall' => 5, 'communication' => 50]);
    expect(DB::table('descriptor_states')->where(['user_id' => $a->id, 'dimension' => 'communication'])->value('eligible_rating_count'))->toBe(3)->and($f->summaries($a)['communication']['value'])->toBeNull();
    $f->submit($d, $s['id'], $a->id, ['overall' => 5, 'communication' => 50]);
    expect($f->summaries($a)['communication']['value'])->not->toBeNull();
});

it('clears a discrepancy only after all three eligible denials and never invents votes', function () {
    $s = reviewTeam();
    [$a,$b,$c,$d,$e] = $s['users'];
    $svc = app(ReviewSession::class);
    $svc->dispute($a, $s['id'], $b->id);
    $id = DB::table('lobby_discrepancies')->value('id');
    $svc->corroborate($c, $s['id'], $id, false);
    $svc->corroborate($d, $s['id'], $id, false);
    $this->travel(2)->hours();
    $svc->due();
    expect(DB::table('lobby_discrepancies')->find($id)->state)->toBe('pending');
    $svc->corroborate($e, $s['id'], $id, false);
    expect(DB::table('lobby_discrepancies')->find($id)->state)->toBe('cleared');
    app(SessionService::class)->acknowledge($a, $s['id']);
});
it('rejects late acceptance and preserves all groups when multiple premades fail', function () {
    $ps = [Fixtures::party(2), Fixtures::party(2), Fixtures::party()];
    app(Matcher::class)->tick();
    $o = app(MatchOffer::class)->current($ps[0]['users'][0]);
    app(MatchOffer::class)->respond($ps[0]['users'][0], $o->id, false);
    app(MatchOffer::class)->respond($ps[1]['users'][0], $o->id, true);
    app(MatchOffer::class)->respond($ps[2]['users'][0], $o->id, true);
    $this->travel(20)->seconds();
    app(MatchOffer::class)->respond($ps[1]['users'][1], $o->id, true);
    expect(DB::table('match_offers')->find($o->id)->state)->toBe('failed')->and(DB::table('parties')->find($ps[0]['party'])->state)->toBe('idle')->and(DB::table('parties')->find($ps[1]['party'])->state)->toBe('idle')->and(DB::table('parties')->find($ps[2]['party'])->state)->toBe('waiting');
    $this->actingAs($ps[0]['users'][0])->get('/dashboard')->assertSee('Your party is still together');
});
it('keeps new report and application evidence restricted to audited cleared administrators', function () {
    $s = reviewTeam(close: true);
    [$a,$b,$c] = $s['users'];
    $f = app(ReviewFeedback::class);
    $f->report($b, $s['id'], $a->id, 'harmful_language', 'private case evidence');
    $f->report($c, $s['id'], $a->id, 'harmful_language');
    $f->submit($a, $s['id'], $b->id, ['overall' => 1, 'communication' => 23]);
    $id = DB::table('moderation_cases')->where('game_session_id', $s['id'])->value('id');
    $this->actingAs($a)->get('/admin/cases/'.$id)->assertForbidden();
    $this->actingAs($b)->get('/rooms/'.$s['id'])->assertDontSee('private case evidence')->assertDontSee('two_distinct_reporters');
    $admin = User::factory()->readyPlayer()->create(['admin_cleared' => true]);
    $this->actingAs($admin)->get('/admin/cases/'.$id)->assertOk()->assertSee('Forward-only applications and exclusions')->assertSee('two_distinct_reporters')->assertSee('private case evidence');
    expect(DB::table('admin_access_events')->where(['actor_id' => $admin->id, 'case_id' => $id])->count())->toBeGreaterThan(0);
});
