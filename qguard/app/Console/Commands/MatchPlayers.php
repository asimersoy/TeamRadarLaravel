<?php

namespace App\Console\Commands;

use App\Domain\Matching\Matcher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class MatchPlayers extends Command
{
    protected $signature = 'qguard:match';

    protected $description = 'Run one bounded, leased matchmaking tick.';

    public function handle(Matcher $matcher): int
    {
        $this->line(json_encode($matcher->tick()));
        Cache::put('qguard-last-success:match', now()->toIso8601String(), 86400);

        return self::SUCCESS;
    }
}
