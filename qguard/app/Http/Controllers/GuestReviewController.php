<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

final class GuestReviewController extends Controller
{
    public function __invoke(): Response
    {
        // A self-contained fictional walkthrough; it does not authenticate an actor.
        $html = file_get_contents(resource_path('review/qguard-review.html'));
        preg_match_all('/<script>(.*?)<\/script>/s', $html, $scripts);
        $hashes = array_map(fn ($script) => "'sha256-".base64_encode(hash('sha256', $script, true))."'", $scripts[1]);
        $policy = "default-src 'none'; script-src ".implode(' ', $hashes)."; style-src 'unsafe-inline'; img-src data:; connect-src 'none'; form-action 'none'; base-uri 'none'; frame-ancestors 'none'; object-src 'none'";

        return response($html)->header('Content-Type', 'text/html; charset=UTF-8')
            ->header('Content-Security-Policy', $policy)
            ->header('Cache-Control', 'no-store, private')
            ->header('Referrer-Policy', 'no-referrer')
            ->header('X-Content-Type-Options', 'nosniff');
    }
}
