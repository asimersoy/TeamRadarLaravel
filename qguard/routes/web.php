<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Dashboard;
use App\Livewire\Room;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('home');
Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth', ['screen' => 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:6,1');
    Route::view('/login', 'auth', ['screen' => 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login');
    Route::view('/forgot-password', 'auth', ['screen' => 'forgot'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgot'])->middleware('throttle:5,1')->name('password.email');
    Route::get('/reset-password/{token}', fn () => view('auth', ['screen' => 'reset']))->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->middleware('throttle:10,1')->name('password.store');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/verify-email', 'auth', ['screen' => 'verify'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('/dashboard', Dashboard::class)->middleware('verified')->name('dashboard');
    Route::get('/rooms/{session}', Room::class)->middleware('verified')->name('room');
});
