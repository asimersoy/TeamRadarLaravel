<?php

namespace App\Providers;

use App\Support\EnvironmentSafety;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('testing') && config('qguard.browser_clock')) {
            EnvironmentSafety::assertDisposableTestDatabase();
            $path = storage_path('app/private/browser-clock.json');
            Carbon::setTestNow(function ($realNow) use ($path) {
                $offset = is_file($path) ? (int) json_decode(file_get_contents($path), true)['offset_seconds'] : 0;

                return $realNow->setTimestamp(time() + $offset);
            });
        }
        RateLimiter::for('login', fn (Request $request) => [
            Limit::perMinute(10)->by('account:'.hash('sha256', strtolower((string) $request->input('email')))),
            Limit::perMinute(100)->by('address:'.$request->ip()),
        ]);
    }
}
