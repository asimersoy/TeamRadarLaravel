<?php

return [
    'public_enabled' => (bool) env('QGUARD_PUBLIC_ENABLED', false),
    'disposable_test_database' => (bool) env('QGUARD_TEST_DATABASE', false),
    'stage' => 1,
];
