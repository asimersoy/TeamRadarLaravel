<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InterfaceLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('interface_locale', 'en');
        app()->setLocale(in_array($locale, ['en', 'tr'], true) ? $locale : 'en');

        return $next($request);
    }
}
