<?php

namespace App\Domain\Game;

final class UnavailableOfficialProfile implements GameProfileProvider
{
    public function retrieve(string $identifier): array
    {
        return ['status' => 'unavailable', 'ownership' => 'unverified', 'rank_source' => 'unknown'];
    }
}
