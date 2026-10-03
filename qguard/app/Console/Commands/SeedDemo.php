<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SeedDemo extends Command
{
    protected $signature = 'qguard:seed-demo {--confirm-synthetic}';

    protected $description = 'Create fictional local accounts and a private generated credential file (never production).';

    public function handle(): int
    {
        if (! app()->environment('local', 'testing') || ! $this->option('confirm-synthetic')) {
            $this->error('Only opt-in local/testing synthetic fixtures are allowed.');

            return self::FAILURE;
        }
        $path = storage_path('app/private/demo-credentials.json');
        $credentials = File::exists($path) ? json_decode(File::get($path), true, flags: JSON_THROW_ON_ERROR) : [];
        DB::transaction(function () use (&$credentials) {
            foreach (array_merge(range('a', 'j'), ['observer', 'admin', 'unverified', 'unranked']) as $label) {
                $handle = 'demo_'.$label;
                $existing = User::where('handle', $handle)->first();
                if ($existing) {
                    throw_unless($existing->is_synthetic, \LogicException::class, 'A non-synthetic account occupies a fixture handle.');

                    continue;
                }
                $password = Str::random(32);
                $user = User::create(['name' => $handle, 'handle' => $handle, 'email' => $handle.'@example.test', 'password' => $password]);
                $user->forceFill(['is_synthetic' => true, 'admin_cleared' => $label === 'admin', 'email_verified_at' => $label === 'unverified' ? null : now(), 'riot_id' => 'Demo'.$label.'#TEST', 'stated_rank' => $label === 'unranked' ? null : 10, 'competitive_access' => true])->save();
                $credentials[$label] = ['email' => $user->email, 'password' => $password, 'handle' => $handle];
            }
        });
        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($credentials, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR));
        chmod($path, 0600);
        $this->info('Synthetic fixtures ready. Credentials are in storage/app/private/demo-credentials.json, never printed or committed.');

        return self::SUCCESS;
    }
}
