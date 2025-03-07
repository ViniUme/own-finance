<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return response('', 200);
    })->name('admin.login');
});
