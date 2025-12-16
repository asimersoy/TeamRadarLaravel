<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameAccount extends Model
{
    protected $fillable = [
        'user_id',
        'game_id',
        'game_username',
        'rank',
        'verified_at',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public const VALORANT_RANKS = [
        0 => 'Unranked',
        1 => 'Iron 1',
        2 => 'Iron 2',
        3 => 'Iron 3',
        4 => 'Bronze 1',
        5 => 'Bronze 2',
        6 => 'Bronze 3',
        7 => 'Silver 1',
        8 => 'Silver 2',
        9 => 'Silver 3',
        10 => 'Gold 1',
        11 => 'Gold 2',
        12 => 'Gold 3',
        13 => 'Platinum 1',
        14 => 'Platinum 2',
        15 => 'Platinum 3',
        16 => 'Diamond 1',
        17 => 'Diamond 2',
        18 => 'Diamond 3',
        19 => 'Ascendant 1',
        20 => 'Ascendant 2',
        21 => 'Ascendant 3',
        22 => 'Immortal 1',
        23 => 'Immortal 2',
        24 => 'Immortal 3',
        25 => 'Radiant',
    ];

    public function getValorantRankNameAttribute(): string
    {
        return self::VALORANT_RANKS[$this->rank] ?? 'Unknown';
    }
}
