<?php

use App\Http\Controllers\Auth\LoginAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login/auth', LoginAuthController::class)->name('api.login.auth');
