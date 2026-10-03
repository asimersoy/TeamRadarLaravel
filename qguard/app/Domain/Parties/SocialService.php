<?php

namespace App\Domain\Parties;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class SocialService
{
    public static function require(bool $condition, string $message): void
    {
        if (! $condition) {
            throw ValidationException::withMessages(['action' => $message]);
        }
    }

    public function request(User $actor, string $handle): void
    {
        MembershipTransaction::run(function () use ($actor, $handle) {
            $other = User::where('handle', strtolower(trim($handle)))->first();
            self::require($other !== null && $other->id !== $actor->id, 'Choose another existing player by their exact handle.');
            $pair = ['user_low' => min($actor->id, $other->id), 'user_high' => max($actor->id, $other->id)];
            $record = DB::table('friendships')->where($pair)->lockForUpdate()->first();
            if ($record && in_array($record->state, ['accepted', 'pending'])) {
                return;
            }
            DB::table('friendships')->updateOrInsert($pair, ['requester_id' => $actor->id, 'state' => 'pending', 'created_at' => $record?->created_at ?? now(), 'updated_at' => now()]);
        });
    }

    public function respond(User $actor, int $id, string $action): void
    {
        MembershipTransaction::run(function () use ($actor, $id, $action) {
            $row = DB::table('friendships')->where('id', $id)->lockForUpdate()->first();
            abort_unless($row && in_array($actor->id, [$row->user_low, $row->user_high]), 403);
            $allowed = match ($action) {
                'accept', 'decline' => $row->state === 'pending' && $row->requester_id !== $actor->id,
                'cancel' => $row->state === 'pending' && $row->requester_id === $actor->id,
                'remove' => $row->state === 'accepted',
                default => false,
            };
            self::require($allowed, 'That friend request has changed. Refresh and try again.');
            DB::table('friendships')->where('id', $id)->update(['state' => match ($action) {
                'accept' => 'accepted', 'decline' => 'declined', 'cancel' => 'cancelled', 'remove' => 'removed'
            }, 'updated_at' => now()]);
        });
    }

    public function areFriends(int $one, int $two): bool
    {
        return DB::table('friendships')->where(['user_low' => min($one, $two), 'user_high' => max($one, $two), 'state' => 'accepted'])->exists();
    }
}
