<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\HomeController;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::post('logout', Logout::class)->name('logout');

Route::middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')->name('login');

    Volt::route('register', 'auth.register')->name('register');

    Volt::route('forgot-password', 'auth.forgot-password')->name('password.request');

    Volt::route('reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('/', HomeController::class)->middleware(['signed'])->name('home');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Volt::route('verify-email', 'auth.verify-email')->name('verification.notice');
    Volt::route('confirm-password', 'auth.confirm-password')->name('password.confirm');

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
});
