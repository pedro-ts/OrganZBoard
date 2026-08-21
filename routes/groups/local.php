<?php

use App\Http\Controllers\Api\Local\LocalController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->apiResource('locals', LocalController::class);
