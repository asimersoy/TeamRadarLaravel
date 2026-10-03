<?php

use App\Domain\Game\UnavailableOfficialProfile;
use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use App\Livewire\Profile;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Livewire\Livewire;
use Symfony\Component\HttpKernel\Exception\HttpException;

uses(RefreshDatabase::class);

it('registers a normalized account with fixed neutral honor and verification gate', function () {
    Notification::fake();
    $this->post('/register', ['handle' => 'Player_One', 'email' => 'PLAYER@example.test', 'password' => 'a-valid-long-password', 'password_confirmation' => 'a-valid-long-password', 'admin_cleared' => true])->assertRedirect('/verify-email');
    $user = User::first();
    expect($user->handle)->toBe('player_one')->and($user->admin_cleared)->toBeFalse();
    expect((float) DB::table('honor_states')->value('honor_score'))->toBe(50.0);
    Notification::assertSentTo($user, VerifyEmail::class);
    $this->get('/dashboard')->assertRedirect('/verify-email');
    $url = URL::temporarySignedRoute('verification.verify', now()->addMinutes(30), ['id' => $user->id, 'hash' => sha1($user->email)]);
    $this->get($url)->assertRedirect('/dashboard');
    $this->get('/dashboard')->assertOk()->assertSee('Matchmaking');
});

it('rejects unsigned verification and unauthorized profile access', function () {
    $user = User::factory()->unverified()->create();
    $this->actingAs($user)->get('/verify-email/'.$user->id.'/'.sha1($user->email))->assertForbidden();
    Livewire::actingAs($user)->test(Profile::class)->assertForbidden();
});

it('uses truthful unavailable provider and protects profile-only fields', function () {
    expect((new UnavailableOfficialProfile)->retrieve('Test#TEST')['ownership'])->toBe('unverified');
    $user = User::factory()->readyPlayer()->create();
    Livewire::actingAs($user)->test(Profile::class)->set('riotId', 'Player#TEST')->set('rank', '12')->call('saveProfile')->assertHasNoErrors();
    expect($user->fresh()->stated_rank)->toBe(12);
    Livewire::actingAs($user)->test(Profile::class)->set('rank', '999')->call('saveProfile')->assertHasErrors('rank');
});

it('requires explicit recipient consent and prevents cross-account friendship mutation', function () {
    [$a,$b,$c] = User::factory()->count(3)->create()->all();
    $social = app(SocialService::class);
    $social->request($a, $b->handle);
    $social->request($b, $a->handle);
    $friend = DB::table('friendships')->first();
    expect(DB::table('friendships')->count())->toBe(1)->and($friend->state)->toBe('pending');
    try {
        $social->respond($c, $friend->id, 'accept');
        $this->fail('Unauthorized actor accepted');
    } catch (HttpException $e) {
        expect($e->getStatusCode())->toBe(403);
    }
    $social->respond($b, $friend->id, 'accept');
    expect($social->areFriends($a->id, $b->id))->toBeTrue();
    $social->respond($a, $friend->id, 'remove');
    expect($social->areFriends($a->id, $b->id))->toBeFalse();
});

it('preserves one active slot and clears readiness after membership or profile changes', function () {
    [$a,$b] = User::factory()->readyPlayer()->count(2)->create()->all();
    $parties = app(PartyService::class);
    $social = app(SocialService::class);
    $social->request($a, $b->handle);
    $social->respond($b, DB::table('friendships')->value('id'), 'accept');
    $id = $parties->create($a);
    $parties->ready($a);
    $parties->invite($a, $b->handle);
    $parties->invitation($b, DB::table('party_invitations')->value('id'), 'accept');
    expect(DB::table('active_participations')->count())->toBe(2)->and(DB::table('party_memberships')->where('ready', true)->count())->toBe(0);
    expect(fn () => $parties->create($b))->toThrow(ValidationException::class);
    $parties->ready($a);
    $parties->ready($b);
    Livewire::actingAs($a)->test(Profile::class)->set('rank', '11')->call('saveProfile')->assertHasNoErrors();
    expect(DB::table('party_memberships')->where('ready', true)->count())->toBe(0);
    $parties->leave($a);
    expect(DB::table('active_participations')->count())->toBe(0)->and(DB::table('party_memberships')->count())->toBe(2)->and(DB::table('parties')->find($id)->state)->toBe('disbanded');
});

it('rejects stale invitations and more than five party members', function () {
    $players = User::factory()->readyPlayer()->count(6)->create();
    $owner = $players[0];
    $parties = app(PartyService::class);
    $social = app(SocialService::class);
    $parties->create($owner);
    foreach ($players->skip(1) as $other) {
        $social->request($owner, $other->handle);
        $social->respond($other, DB::table('friendships')->where('user_high', max($owner->id, $other->id))->value('id'), 'accept');
        $parties->invite($owner, $other->handle);
    }
    foreach ($players->slice(1, 4) as $other) {
        $parties->invitation($other, DB::table('party_invitations')->where('recipient_id', $other->id)->value('id'), 'accept');
    }
    expect(fn () => $parties->invitation($players[5], DB::table('party_invitations')->where('recipient_id', $players[5]->id)->value('id'), 'accept'))->toThrow(ValidationException::class);
    expect(DB::table('active_participations')->count())->toBe(5);
});

it('blocks readiness for an unplaced account and does not disclose others honor or email', function () {
    $user = User::factory()->readyPlayer()->create(['stated_rank' => null]);
    app(PartyService::class)->create($user);
    expect(fn () => app(PartyService::class)->ready($user))->toThrow(ValidationException::class);
    $other = User::factory()->create();
    $this->actingAs($user)->get('/dashboard')->assertOk()->assertDontSee($other->email)->assertDontSee('smoothed_raw_rating_reference');
});
