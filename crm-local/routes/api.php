<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\Dictionary\UnitController;
use App\Http\Controllers\Api\Dictionary\PaymentTypeController;
use App\Http\Controllers\Api\Dictionary\EmployeeTypeController;
use App\Http\Controllers\Api\Dictionary\EquipmentGroupController;
use App\Http\Controllers\Api\Dictionary\PositionController;

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

// Группа для справочников (только администраторы и менеджеры)
Route::middleware(['auth:api', 'role:admin,manager'])->prefix('dictionaries')->group(function () {
    // Единицы измерения
    Route::get('units', [UnitController::class, 'index']);
    Route::get('units/{id}', [UnitController::class, 'show']);
    Route::post('units', [UnitController::class, 'store']);
    Route::put('units/{id}', [UnitController::class, 'update']);
    Route::delete('units/{id}', [UnitController::class, 'destroy']);
    Route::post('units/{id}/restore', [UnitController::class, 'restore']);

    // Типы платежей
    Route::get('payment-types', [PaymentTypeController::class, 'index']);
    Route::get('payment-types/{id}', [PaymentTypeController::class, 'show']);
    Route::post('payment-types', [PaymentTypeController::class, 'store']);
    Route::put('payment-types/{id}', [PaymentTypeController::class, 'update']);
    Route::delete('payment-types/{id}', [PaymentTypeController::class, 'destroy']);
    Route::post('payment-types/{id}/restore', [PaymentTypeController::class, 'restore']);

    // Типы сотрудников
    Route::get('employee-types', [EmployeeTypeController::class, 'index']);
    Route::get('employee-types/{id}', [EmployeeTypeController::class, 'show']);
    Route::post('employee-types', [EmployeeTypeController::class, 'store']);
    Route::put('employee-types/{id}', [EmployeeTypeController::class, 'update']);
    Route::delete('employee-types/{id}', [EmployeeTypeController::class, 'destroy']);
    Route::post('employee-types/{id}/restore', [EmployeeTypeController::class, 'restore']);

    // Группы оборудования
    Route::get('equipment-groups', [EquipmentGroupController::class, 'index']);
    Route::get('equipment-groups/{id}', [EquipmentGroupController::class, 'show']);
    Route::post('equipment-groups', [EquipmentGroupController::class, 'store']);
    Route::put('equipment-groups/{id}', [EquipmentGroupController::class, 'update']);
    Route::delete('equipment-groups/{id}', [EquipmentGroupController::class, 'destroy']);
    Route::post('equipment-groups/{id}/restore', [EquipmentGroupController::class, 'restore']);

    // Должности
    Route::get('positions', [PositionController::class, 'index']);
    Route::get('positions/{id}', [PositionController::class, 'show']);
    Route::post('positions', [PositionController::class, 'store']);
    Route::put('positions/{id}', [PositionController::class, 'update']);
    Route::delete('positions/{id}', [PositionController::class, 'destroy']);
    Route::post('positions/{id}/restore', [PositionController::class, 'restore']);
});

// (если используешь Sanctum для web, можешь оставить этот маршрут)
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
