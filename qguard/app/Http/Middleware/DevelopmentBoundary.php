<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class DevelopmentBoundary
{
    public function handle(Request $request, Closure $next): Response
    {
        // An image build must not silently authorize real-user collection.
        abort_unless(app()->environment(['local', 'testing']) || config('qguard.public_enabled'), 503);

        return $next($request);
    }
}
