<?php

namespace App\Console\Commands;

use App\Domain\Matching\Matcher;
use Illuminate\Console\Command;

class MatchPlayers extends Command
{
    protected $signature = 'qguard:match';

    protected $description = 'Run one bounded, leased matchmaking tick.';

    public function handle(Matcher $matcher): int
    {
        $this->line(json_encode($matcher->tick()));

        return self::SUCCESS;
    }
}
