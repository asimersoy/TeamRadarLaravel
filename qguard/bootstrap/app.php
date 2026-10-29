<?php

use App\Http\Middleware\DevelopmentBoundary;
use App\Http\Middleware\HostedReviewOnly;
use App\Http\Middleware\InterfaceLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(HostedReviewOnly::class);
        $middleware->web(append: [InterfaceLocale::class, DevelopmentBoundary::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->respond(function ($response) {
            if ($response->getStatusCode() === 403) {
                Log::notice('QGuard access denied', ['actor_id' => auth()->id(), 'route' => request()->route()?->getName()]);
            }

            return $response;
        });
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
