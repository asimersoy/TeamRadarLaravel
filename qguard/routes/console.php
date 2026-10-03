<?php

Schedule::command('qguard:match')->everyFiveSeconds()->withoutOverlapping();
Schedule::command('qguard:session-deadlines')->everySecond()->withoutOverlapping();

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
