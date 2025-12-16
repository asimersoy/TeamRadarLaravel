<?php

namespace App\Http\Middleware;

use App\Models\Game;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureGameAccountExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $gameSlug = 'valorant'): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Check if user has an account for this game
        // We use whereHas to check the relationship
        $hasAccount = $user->gameAccounts()
            ->whereHas('game', function ($query) use ($gameSlug) {
                $query->where('slug', $gameSlug);
            })
            ->exists();

        if (! $hasAccount) {
            return redirect()->route('setup.game', ['game' => $gameSlug]);
        }

        return $next($request);
    }
}
