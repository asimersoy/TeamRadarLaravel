<?php

namespace Tests;

use App\Support\EnvironmentSafety;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUpTraits()
    {
        EnvironmentSafety::assertDisposableTestDatabase();

        return parent::setUpTraits();
    }
}
