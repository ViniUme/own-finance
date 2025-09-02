<?php

use App\Http\Controllers\Auth\LoginAuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('api')->group(function () {
    Route::post('login/authentication', LoginAuthenticationController::class)->name('api.login.authentication');
});
