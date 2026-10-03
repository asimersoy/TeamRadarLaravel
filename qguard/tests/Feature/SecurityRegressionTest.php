<?php

use App\Domain\Feedback\FeedbackService;
use App\Domain\Sessions\SessionService;
use App\Livewire\Dashboard;
use App\Livewire\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;
use Livewire\Livewire;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);

it('rotates the password session and reloads outer CSRF tokens while revoking other logins', function () {
    $a = User::factory()->readyPlayer()->create(['password' => 'initial-synthetic-password']);
    DB::table('sessions')->insert(['id' => 'other-synthetic-session', 'user_id' => $a->id, 'payload' => '', 'last_activity' => time()]);
    Livewire::actingAs($a)->test(Dashboard::class)->set('currentPassword', 'initial-synthetic-password')->set('newPassword', 'replacement-synthetic-password')->set('newPasswordConfirmation', 'replacement-synthetic-password')->call('changePassword')->assertHasNoErrors()->assertRedirect('/dashboard');
    expect(DB::table('sessions')->where('id', 'other-synthetic-session')->exists())->toBeFalse();
    expect(Hash::check('replacement-synthetic-password', $a->fresh()->password))->toBeTrue();
});

it('refuses fixture seeding without opt-in and outside local test environments', function () {
    $this->artisan('qguard:seed-demo')->assertFailed();
    app()->instance('env', 'production');
    $this->artisan('qguard:seed-demo', ['--confirm-synthetic' => true])->assertFailed();
    expect(User::count())->toBe(0);
});

it('keeps handle edits separate from immutable matched snapshots and protects uniqueness', function () {
    $s = Fixtures::session();
    $a = $s['users'][0];
    $old = $a->handle;
    Livewire::actingAs($a)->test(Dashboard::class)->set('handle', 'new_public_handle')->call('saveHandle')->assertHasNoErrors();
    expect($a->fresh()->handle)->toBe('new_public_handle');
    expect(DB::table('session_participants')->where('user_id', $a->id)->value('handle'))->toBe($old);
    Livewire::actingAs($a)->test(Dashboard::class)->set('handle', $s['users'][1]->handle)->call('saveHandle')->assertHasErrors('handle');
});

it('rejects locked component id spoofing and unknown fixture endpoints', function () {
    $s = Fixtures::session();
    expect(fn () => Livewire::actingAs($s['users'][0])->test(Room::class, ['session' => $s['id']])->set('sessionId', 999999))->toThrow(CannotUpdateLockedPropertyException::class);
    $this->get('/test-clock')->assertNotFound();
    $this->post('/seed-demo')->assertNotFound();
    $this->post('/admin/grant')->assertNotFound();
});

it('enforces action and login throttles without exposing private credentials', function () {
    $a = User::factory()->readyPlayer()->create();
    for ($i = 0; $i < 60; $i++) {
        RateLimiter::hit('dashboard:'.$a->id, 60);
    }
    Livewire::actingAs($a)->test(Dashboard::class)->call('createParty')->assertStatus(429);
    auth()->logout();
    for ($i = 0; $i < 10; $i++) {
        $this->post('/login', ['email' => $a->email, 'password' => 'wrong'])->assertRedirect();
    }
    $this->post('/login', ['email' => $a->email, 'password' => 'wrong'])->assertStatus(429)->assertDontSee($a->password);
});

it('preserves retained evidence while clearing only runtime slots on complete sessions', function () {
    $s = Fixtures::session([5]);
    foreach ($s['users'] as $u) {
        app(SessionService::class)->end($u, $s['id']);
        app(FeedbackService::class)->finalize($u, $s['id'], [], false, true);
    }
    expect(DB::table('session_participants')->where('game_session_id', $s['id'])->count())->toBe(5);
    expect(DB::table('feedback_submissions')->where('game_session_id', $s['id'])->count())->toBe(5);
    expect(DB::table('active_participations')->count())->toBe(0);
    expect(DB::table('honor_applications')->count())->toBe(0);
});
