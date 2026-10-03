<?php

namespace App\Console\Commands;

use App\Domain\Feedback\SettlementService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SettleFeedback extends Command
{
    protected $signature = 'qguard:settle';

    protected $description = 'Settle due feedback windows exactly once.';

    public function handle(): int
    {
        app(SettlementService::class)->due();
        Cache::put('qguard-last-success:settle', now()->toIso8601String(), 86400);

        return self::SUCCESS;
    }
}
