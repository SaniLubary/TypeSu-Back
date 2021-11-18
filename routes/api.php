<?php

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\SoundController;
use App\Http\Controllers\MediaTimingController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// Public Routes //

// Session
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Quotes
Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/{id}', [QuoteController::class, 'show']);

// Sources
Route::get('/sources', [SourceController::class, 'index']);
Route::get('/sources/{id}', [SourceController::class, 'show']);

/// Protected Routes //
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Session
    Route::post('/logout', [AuthController::class, 'logout']);

    // Quotes
    Route::post('/quotes', [QuoteController::class, 'store']);
    Route::put('/quotes/{id}', [QuoteController::class, 'update']);
    Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);
});
