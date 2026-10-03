<?php

namespace App\Domain\Game;

final class Valorant
{
    public const SHARDS = ['eu' => 'Europe', 'na' => 'North America', 'ap' => 'Asia Pacific', 'kr' => 'Korea', 'br' => 'Brazil', 'latam' => 'Latin America'];

    public const LANGUAGES = ['en' => 'English', 'tr' => 'Turkish', 'de' => 'German', 'fr' => 'French', 'es' => 'Spanish', 'pt' => 'Portuguese', 'ru' => 'Russian', 'ko' => 'Korean', 'ja' => 'Japanese'];

    public static function ranks(): array
    {
        $ranks = [];
        foreach (['Iron', 'Bronze', 'Silver', 'Gold', 'Platinum', 'Diamond', 'Ascendant', 'Immortal'] as $tier => $name) {
            for ($level = 1; $level <= 3; $level++) {
                $ranks[$tier * 3 + $level] = "$name $level";
            }
        }

        return $ranks + [25 => 'Radiant'];
    }
}
