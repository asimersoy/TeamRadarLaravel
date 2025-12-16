<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

//Route::get("/", "HomeController@index")->name("home");

Route::get("/", [HomeController::class, 'index'])->name('home');




use Illuminate\Support\Facades\Redis;

Route::get('/redis-test', function () {
    Redis::set('foo', 'bar');
    return Redis::get('foo'); // should return "bar"
});



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('matchmaking', 'matchmaking')
    ->middleware(['auth', 'verified', \App\Http\Middleware\EnsureGameAccountExists::class.':valorant'])
    ->name('matchmaking');

Route::get('setup/{game}', \App\Livewire\SetupGameAccount::class)
    ->middleware(['auth', 'verified'])
    ->name('setup.game');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
