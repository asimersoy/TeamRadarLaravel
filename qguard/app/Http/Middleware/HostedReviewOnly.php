<?php

namespace App\Http\Middleware;

use App\Http\Controllers\GuestReviewController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class HostedReviewOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('qguard.hosted_review_only') || $request->is('up')) {
            return $next($request);
        }

        // Stop before web sessions/authentication: the hosted review collects no accounts.
        $readOnly = in_array($request->method(), ['GET', 'HEAD'], true);
        $response = match (true) {
            $readOnly && $request->path() === '/' => redirect('/guest#welcome'),
            $readOnly && $request->is('guest') => app(GuestReviewController::class)(),
            default => response('QGuard is in review. Registration and live play are not available yet.', 503),
        };

        return $response->header('X-Robots-Tag', 'noindex, nofollow, noarchive')
            ->header('Cache-Control', 'no-store, private');
    }
}
