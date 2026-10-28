<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SystemStatus extends Command
{
    protected $signature = 'qguard:status';

    protected $description = 'Read operational counts and last successful sweeps without exposing business payloads.';

    public function handle(): int
    {
        DB::select('select 1');
        $heartbeats = [];
        foreach (['match', 'session-deadlines', 'settle'] as $name) {
            $heartbeats[$name] = Cache::get('qguard-last-success:'.$name);
        }
        $this->line(json_encode([
            'database' => 'reachable',
            'successful_sweeps_utc' => $heartbeats,
            'waiting_parties' => DB::table('queue_entries')->where('state', 'waiting')->count(),
            'due_match_offers' => DB::table('match_offers')->where('state', 'pending')->where('deadline', '<=', now())->count(),
            'due_shared_session_ends' => DB::table('game_sessions')->where(['workflow_version' => 'review-v2', 'state' => 'active'])->where('end_deadline', '<=', now())->count(),
            'pending_review_cards' => DB::table('review_feedback_cards')->whereNull('submitted_at')->count(),
            'due_feedback' => DB::table('game_sessions')->whereNull('settled_at')->where('state', 'active')->where('feedback_deadline', '<=', now())->count(),
            'due_no_shows' => DB::table('no_show_requests')->where('state', 'responding')->where('response_deadline', '<=', now())->count(),
            'pending_jobs' => DB::table('jobs')->count(),
            'failed_jobs' => DB::table('failed_jobs')->count(),
        ], JSON_PRETTY_PRINT));

        return self::SUCCESS;
    }
}
