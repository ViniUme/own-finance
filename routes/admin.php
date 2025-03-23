<?php

use App\Http\Controllers\Admin\Login\AdminLoginAuthController;
use App\Http\Controllers\Admin\Login\AdminLoginViewController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::prefix('login')->group(function () {
        Route::get('/', AdminLoginViewController::class)->name('admin.login');
        Route::post('/', AdminLoginAuthController::class)->name('admin.login.auth');
    });

    Route::middleware([Admin::class])->group(function () {
        Route::get('/dashboard', function(){
            return response('', 200);
        })->name('admin.dashboard');
    });
});
