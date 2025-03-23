<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return response('', 200);
    })->name('admin.login');

    Route::middleware([Admin::class])->group(function () {
        Route::get('/dashboard', function(){
            return response('', 200);
        })->name('admin.dashboard');
    });
});
