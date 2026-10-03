<?php

namespace App\Console\Commands;

use App\Domain\Feedback\SettlementService;
use Illuminate\Console\Command;

class SettleFeedback extends Command
{
    protected $signature = 'qguard:settle';

    protected $description = 'Settle due feedback windows exactly once.';

    public function handle(): int
    {
        app(SettlementService::class)->due();

        return self::SUCCESS;
    }
}
