<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('qguard:match')->everyFiveSeconds()->withoutOverlapping();
Schedule::command('qguard:session-deadlines')->everySecond()->withoutOverlapping();
Schedule::command('qguard:settle')->everySecond()->withoutOverlapping();
