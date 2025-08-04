<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

Route::post('login', [\App\Http\Controllers\Api\AuthApiController::class, 'login']);
Route::middleware('auth:api')->get('me', [\App\Http\Controllers\Api\AuthApiController::class, 'me']);
Route::middleware('auth:api')->post('logout', [\App\Http\Controllers\Api\AuthApiController::class, 'logout']);

Route::post('forgot-password', [\App\Http\Controllers\Api\PasswordResetController::class, 'sendResetLinkEmail']);


});
