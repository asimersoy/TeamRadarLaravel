<?php

return [
    'hosted_review_only' => (bool) env('QGUARD_HOSTED_REVIEW_ONLY', false),
    'public_enabled' => (bool) env('QGUARD_PUBLIC_ENABLED', false),
    'disposable_test_database' => (bool) env('QGUARD_TEST_DATABASE', false),
    'review_test_engine' => (bool) env('QGUARD_REVIEW_TEST_ENGINE', false),
    'first_pass_test_engine' => (bool) env('QGUARD_FIRST_PASS_TEST_ENGINE', false),
    'reverb_browser_host' => env('REVERB_BROWSER_HOST', env('REVERB_HOST', 'localhost')),
    'reverb_browser_port' => (int) env('REVERB_BROWSER_PORT', env('REVERB_PORT', 8122)),
    'browser_clock' => (bool) env('QGUARD_BROWSER_CLOCK', false),
];
