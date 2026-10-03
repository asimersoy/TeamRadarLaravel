<?php

namespace App\Console\Commands;

use App\Domain\Sessions\SessionService;
use Illuminate\Console\Command;

class SessionDeadlines extends Command
{
    protected $signature = 'qguard:session-deadlines';

    protected $description = 'Resolve due no-show requests using current locked state.';

    public function handle(SessionService $service): int
    {
        $this->line((string) $service->deadlines());

        return self::SUCCESS;
    }
}
