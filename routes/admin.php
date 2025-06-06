<?php

use App\Http\Controllers\Admin\Login\AdminLoginAuthController;
use App\Http\Controllers\Admin\Login\AdminLoginViewController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/login', AdminLoginViewController::class)->name('admin.login');

    Route::prefix('api')->group(function () {
        Route::post('/login', AdminLoginAuthController::class)->name('api.admin.login.auth');
    });

    Route::middleware([Admin::class])->group(function () {
        Route::get('/dashboard', function(){
            return response('', 200);
        })->name('admin.dashboard');
    });
});
