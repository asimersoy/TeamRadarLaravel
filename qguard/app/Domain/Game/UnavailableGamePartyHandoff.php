<?php

namespace App\Domain\Game;

final class UnavailableGamePartyHandoff implements GamePartyHandoff
{
    public function status(): array
    {
        return ['available' => false, 'message' => 'Game joining is not integrated. Coordinate manually; QGuard cannot confirm an in-game party or match.'];
    }
}
