<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/login', function () {
        return response('', 200);
    })->name('admin.login');

    Route::get('/dashboard', function(){
        return response('', 200);
    })->name('admin.dashboard');
});
