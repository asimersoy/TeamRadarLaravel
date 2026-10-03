<?php

namespace Tests\Support;

use App\Domain\Matching\Matcher;
use App\Domain\Matching\QueueService;
use App\Domain\Parties\PartyService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class Fixtures
{
    public static function party(int $size = 1, array $attributes = []): array
    {
        $users = User::factory()->readyPlayer()->count($size)->create($attributes);
        $service = app(PartyService::class);
        $id = $service->create($users[0]);
        foreach ($users->skip(1) as $user) {
            DB::table('party_memberships')->insert(['party_id' => $id, 'user_id' => $user->id, 'joined_at' => now()]);
            DB::table('active_participations')->insert(['party_id' => $id, 'user_id' => $user->id]);
        }
        foreach ($users as $user) {
            $service->ready($user);
        }
        app(QueueService::class)->enter($users[0]);

        return ['party' => $id, 'users' => $users, 'entry' => DB::table('queue_entries')->where('party_id', $id)->first()];
    }

    public static function session(array $sizes = [1, 1, 1, 1, 1]): array
    {
        $parties = array_map(fn ($size) => self::party($size), $sizes);
        app(Matcher::class)->tick();
        $id = DB::table('active_participations')->where('user_id', $parties[0]['users'][0]->id)->value('game_session_id');

        return ['id' => $id, 'users' => collect($parties)->flatMap(fn ($p) => $p['users']), 'parties' => $parties];
    }
}
