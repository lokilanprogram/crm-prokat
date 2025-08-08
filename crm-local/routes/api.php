<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;

// Аутентификация и восстановление пароля
Route::post('login', [AuthApiController::class, 'login']);
Route::post('forgot-password', [AuthApiController::class, 'forgotPassword']);

// Группа защищённых роутов (auth:api)
Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthApiController::class, 'me']);
    Route::post('logout', [AuthApiController::class, 'logout']);

    // CRUD пользователей (только для админов!)
    Route::get('users', [AuthApiController::class, 'index']);         
    Route::get('users/{id}', [AuthApiController::class, 'show']);     
    Route::post('users', [AuthApiController::class, 'store']);        
    Route::put('users/{id}', [AuthApiController::class, 'update']);   
    Route::delete('users/{id}', [AuthApiController::class, 'destroy']);
});

// (если используешь Sanctum для web, можешь оставить этот маршрут)
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
