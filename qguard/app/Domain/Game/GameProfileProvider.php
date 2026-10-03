<?php

namespace App\Domain\Game;

interface GameProfileProvider
{
    /** No successful identity/rank result may be fabricated without provider evidence. */
    public function retrieve(string $identifier): array;
}
