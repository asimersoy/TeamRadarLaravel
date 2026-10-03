<?php

use App\Domain\Parties\PartyService;
use App\Domain\Parties\SocialService;
use App\Livewire\Dashboard;
use App\Livewire\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);

it('separates protected account forms from matchmaking without breaking the dashboard URL', function () {
    $this->get('/profile')->assertRedirect('/login');
    $unverified = User::factory()->unverified()->create();
    $this->actingAs($unverified)->get('/profile')->assertRedirect('/verify-email');
    Livewire::actingAs($unverified)->test(Dashboard::class)->assertForbidden();
    Livewire::actingAs($unverified)->test(Profile::class)->assertForbidden();
    $user = User::factory()->readyPlayer()->create();
    $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Matchmaking')->assertSee('Friends sidebar')
        ->assertDontSee('wire:model="riotId"', false)->assertDontSee('wire:model="currentPassword"', false);
    $this->get('/profile')->assertOk()->assertSee('Account security')->assertSee('wire:model="riotId"', false)
        ->assertSee('wire:model="currentPassword"', false)->assertDontSee('Start a party')->assertDontSee('Friends sidebar');
});

it('keeps profile reachable while matched and does not mutate the roster on profile edits', function () {
    $session = Fixtures::session();
    $user = $session['users'][0];
    $before = DB::table('session_participants')->where('user_id', $user->id)->first();
    $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Open team room')->assertSee('Friends sidebar');
    $this->get('/profile')->assertOk()->assertSee('Save game profile');
    Livewire::actingAs($user)->test(Profile::class)->set('riotId', 'Changed#TEST')->set('rank', '11')->call('saveProfile')->assertHasNoErrors();
    expect(DB::table('session_participants')->where('user_id', $user->id)->first())->toEqual($before);
    expect(DB::table('active_participations')->where('user_id', $user->id)->value('game_session_id'))->toBe($session['id']);
});

it('authorizes sidebar invites against an accepted friendship and the existing party rules', function () {
    [$owner, $friend, $outsider] = User::factory()->readyPlayer()->count(3)->create()->all();
    $friend->forceFill(['riot_id' => 'PrivateFriend#TEST'])->save();
    $social = app(SocialService::class);
    $social->request($owner, $friend->handle);
    $friendship = DB::table('friendships')->value('id');
    app(PartyService::class)->create($owner);
    Livewire::actingAs($owner)->test(Dashboard::class)->call('inviteFriend', $friendship)->assertForbidden();
    $social->respond($friend, $friendship, 'accept');
    Livewire::actingAs($outsider)->test(Dashboard::class)->call('inviteFriend', $friendship)->assertForbidden();
    Livewire::actingAs($friend)->test(Dashboard::class)->call('inviteFriend', $friendship)->assertHasErrors('action');
    Livewire::actingAs($owner)->test(Dashboard::class)->call('inviteFriend', $friendship)->assertHasNoErrors();
    expect(DB::table('party_invitations')->where('recipient_id', $friend->id)->count())->toBe(1);
    Livewire::actingAs($owner)->test(Dashboard::class)->call('inviteFriend', $friendship)->assertHasNoErrors();
    expect(DB::table('party_invitations')->where('recipient_id', $friend->id)->count())->toBe(1);
    $this->actingAs($owner)->get('/dashboard')->assertDontSee($friend->email)->assertDontSee($friend->riot_id);
});
