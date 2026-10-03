<?php

namespace App\Console\Commands;

use App\Domain\Sessions\SessionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SessionDeadlines extends Command
{
    protected $signature = 'qguard:session-deadlines';

    protected $description = 'Resolve due no-show requests using current locked state.';

    public function handle(SessionService $service): int
    {
        $this->line((string) $service->deadlines());
        Cache::put('qguard-last-success:session-deadlines', now()->toIso8601String(), 86400);

        return self::SUCCESS;
    }
}
