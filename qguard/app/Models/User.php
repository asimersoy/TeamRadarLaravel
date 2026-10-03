<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

#[Fillable(['name', 'email', 'password', 'handle'])]
#[Hidden(['password', 'remember_token', 'admin_cleared', 'is_synthetic'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $attributes = ['shard' => 'eu', 'language' => 'en', 'competitive_access' => false, 'admin_cleared' => false, 'is_synthetic' => false];

    protected static function booted(): void
    {
        static::created(fn (User $user) => DB::table('honor_states')->insert([
            'user_id' => $user->id, 'created_at' => now(), 'updated_at' => now(),
        ]));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'competitive_access' => 'boolean',
            'admin_cleared' => 'boolean',
            'is_synthetic' => 'boolean',
            'stated_rank' => 'integer',
        ];
    }
}
