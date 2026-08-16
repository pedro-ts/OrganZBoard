<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Support\Facades\Route;

// Rotas de auth
Route::prefix('auth')->group(function (){

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/logout', [AuthController::class, 'logout']);
    });

});

// Rotas de User
Route::middleware('auth::sanctum')->apiResource('users', UserController::class);
