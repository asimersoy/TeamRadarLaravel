<?php

namespace App\Support;

final class ReviewVersion
{
    public const QUEUE_MESSAGE = 'Normal matchmaking is unavailable until Riot account linking is integrated. You can explore the guest walkthrough now.';

    public static function reviewEngineEnabled(): bool
    {
        if (! app()->environment('testing') || ! config('qguard.review_test_engine')) {
            return false;
        }
        EnvironmentSafety::assertDisposableTestDatabase();

        return true;
    }

    public static function historicalEngineEnabled(): bool
    {
        if (! app()->environment('testing') || ! config('qguard.first_pass_test_engine')) {
            return false;
        }

        EnvironmentSafety::assertDisposableTestDatabase();

        return true;
    }
}
