<?php

use App\Domain\Parties\PartyService;
use App\Domain\Sessions\SessionService;
use App\Events\RoomChanged;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Tests\Support\Fixtures;

uses(RefreshDatabase::class);

it('requires five minutes and four distinct other votes, with idempotent votes', function () {
    $s = Fixtures::session();
    $service = app(SessionService::class);
    $target = $s['users'][4];
    expect(fn () => $service->vote($s['users'][0], $s['id'], $target->id))->toThrow(ValidationException::class);
    $this->travel(5)->minutes();
    foreach ($s['users']->take(3) as $u) {
        $service->vote($u, $s['id'], $target->id);
        $service->vote($u, $s['id'], $target->id);
    }
    expect(DB::table('no_show_votes')->count())->toBe(3)->and(DB::table('no_show_requests')->value('response_deadline'))->toBeNull();
    $service->vote($s['users'][3], $s['id'], $target->id);
    expect(DB::table('no_show_requests')->value('state'))->toBe('responding');
    $this->travel(29)->seconds();
    $service->acknowledge($target, $s['id']);
    $this->travel(2)->seconds();
    expect($service->deadlines())->toBe(0)->and(DB::table('game_sessions')->find($s['id'])->state)->toBe('active');
    expect(fn () => $service->vote($s['users'][0], $s['id'], $target->id))->toThrow(ValidationException::class);
});

it('disbands on deadline without affecting a newer active slot and revokes the target read access', function () {
    $s = Fixtures::session();
    $service = app(SessionService::class);
    $target = $s['users'][4];
    $leaving = $s['users'][0];
    $this->travel(5)->minutes();
    foreach ($s['users']->take(4) as $u) {
        $service->vote($u, $s['id'], $target->id);
    }
    $service->end($leaving, $s['id']);
    $newParty = app(PartyService::class)->create($leaving);
    $this->travel(30)->seconds();
    expect($service->deadlines())->toBe(1)->and($service->deadlines())->toBe(0);
    expect(DB::table('active_participations')->where('user_id', $leaving->id)->value('party_id'))->toBe($newParty);
    expect(DB::table('honor_states')->where('honor_score', '!=', 50)->count())->toBe(0);
    $this->actingAs($target)->getJson('/rooms/'.$s['id'].'/messages')->assertForbidden();
    $this->actingAs($leaving)->get('/rooms/'.$s['id'])->assertOk();
});

it('marks an ended target request stale and does not lower quorum for ended voters', function () {
    $s = Fixtures::session();
    $service = app(SessionService::class);
    $this->travel(5)->minutes();
    $service->vote($s['users'][0], $s['id'], $s['users'][4]->id);
    $service->end($s['users'][4], $s['id']);
    expect(DB::table('no_show_requests')->value('state'))->toBe('stale_target_ended');
    expect(fn () => $service->vote($s['users'][4], $s['id'], $s['users'][0]->id))->toThrow(ValidationException::class);
    expect(DB::table('game_sessions')->find($s['id'])->feedback_deadline)->toBeNull();
});

it('reauthorizes chat, deduplicates retries, rejects scripts and retains literal text', function () {
    $s = Fixtures::session();
    $a = $s['users'][0];
    $uri = '/rooms/'.$s['id'].'/messages';
    $id = (string) Str::uuid();
    $this->actingAs($a)->postJson($uri, ['body' => '<script>alert(1)</script> hello https://example.test', 'client_message_id' => $id])->assertOk();
    $this->postJson($uri, ['body' => '<script>alert(1)</script> hello https://example.test', 'client_message_id' => $id])->assertOk();
    expect(DB::table('chat_messages')->where('game_session_id', $s['id'])->count())->toBe(1);
    $this->postJson($uri, ['body' => 'javascript:alert(1)', 'client_message_id' => (string) Str::uuid()])->assertUnprocessable();
    $this->postJson($uri, ['body' => str_repeat('a', 2001), 'client_message_id' => (string) Str::uuid()])->assertUnprocessable();
    for ($attempt = 0; $attempt < 30; $attempt++) {
        RateLimiter::hit('chat:'.$a->id, 60);
    }
    $this->postJson($uri, ['body' => 'rate limited', 'client_message_id' => (string) Str::uuid()])->assertStatus(429);
    // An exact retry remains safe even when the sender has reached the limit.
    $this->postJson($uri, ['body' => '<script>alert(1)</script> hello https://example.test', 'client_message_id' => $id])->assertOk();
    RateLimiter::clear('chat:'.$a->id);
    $this->getJson($uri)->assertOk()->assertJsonPath('messages.0.handle', $a->handle)->assertJsonMissingPath('messages.0.sender_id');
    $this->actingAs(User::factory()->create())->getJson($uri)->assertForbidden();
    $this->postJson($uri, ['body' => 'outsider', 'client_message_id' => (string) Str::uuid()])->assertForbidden();
    app(SessionService::class)->end($a, $s['id']);
    $this->actingAs($a)->postJson($uri, ['body' => 'after end', 'client_message_id' => (string) Str::uuid()])->assertUnprocessable();
    $this->getJson($uri)->assertJsonPath('can_post', false);
});

it('closes chat at the feedback deadline even before the worker runs and paginates history', function () {
    $s = Fixtures::session();
    $a = $s['users'][0];
    $uri = '/rooms/'.$s['id'].'/messages';
    for ($i = 0; $i < 55; $i++) {
        DB::table('chat_messages')->insert(['game_session_id' => $s['id'], 'sender_id' => $a->id, 'client_message_id' => (string) Str::uuid(), 'body' => 'message '.$i, 'created_at' => now()]);
    }
    $response = $this->actingAs($a)->getJson($uri)->assertJsonCount(50, 'messages');
    $this->getJson($uri.'?before='.$response->json('older_cursor'))->assertJsonCount(5, 'messages');
    DB::table('game_sessions')->where('id', $s['id'])->update(['feedback_deadline' => now()]);
    $this->postJson($uri, ['body' => 'late', 'client_message_id' => (string) Str::uuid()])->assertUnprocessable();
    expect((new RoomChanged($s['id'], 3))->broadcastWith())->toBe(['session_id' => $s['id'], 'version' => 3]);
});

it('authorizes private socket subscriptions by current room membership', function () {
    $s = Fixtures::session();
    config(['broadcasting.default' => 'reverb']);
    // Register callbacks on the driver selected for this test, not the null driver used at boot.
    require base_path('routes/channels.php');
    $data = ['socket_id' => '123.456', 'channel_name' => 'private-room.'.$s['id']];
    $this->actingAs($s['users'][0])->postJson('/broadcasting/auth', $data)->assertOk();
    $this->actingAs(User::factory()->create())->postJson('/broadcasting/auth', $data)->assertForbidden();
    DB::table('session_participants')->where(['game_session_id' => $s['id'], 'user_id' => $s['users'][0]->id])->update(['state' => 'removed_no_show']);
    $this->actingAs($s['users'][0])->postJson('/broadcasting/auth', $data)->assertForbidden();
});
