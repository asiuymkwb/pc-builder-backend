<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompatibilityController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// --- Pubbliche ---
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/admin/login', [AdminLoginController::class, 'store']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/components', [ComponentController::class, 'index']);
Route::get('/components/{id}', [ComponentController::class, 'show']);

// --- Utente autenticato ---
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/me', [LoginController::class, 'me']);

    Route::get('/builds', [BuildController::class, 'index']);
    Route::post('/builds', [BuildController::class, 'store']);
    Route::get('/builds/{id}', [BuildController::class, 'show']);
    Route::patch('/builds/{id}', [BuildController::class, 'update']);
    Route::delete('/builds/{id}', [BuildController::class, 'destroy']);
    Route::post('/builds/{id}/components', [BuildController::class, 'addComponent']);
    Route::delete('/builds/{id}/components/{componentId}', [BuildController::class, 'removeComponent']);
    Route::get('/builds/{id}/compatibility', [CompatibilityController::class, 'check']);

    Route::post('/builds/{buildId}/quote', [QuoteController::class, 'generate']);
    Route::get('/quotes', [QuoteController::class, 'index']);
});

// --- Admin ---
Route::middleware(['auth:sanctum', 'is_admin'])->prefix('admin')->group(function () {
    Route::apiResource('components', Admin\ComponentController::class);
    Route::apiResource('categories', Admin\CategoryController::class);
    Route::get('users', [Admin\UserController::class, 'index']);
    Route::patch('users/{id}', [Admin\UserController::class, 'update']);
    Route::delete('users/{id}', [Admin\UserController::class, 'destroy']);
    Route::get('stats', [Admin\StatsController::class, 'index']);
});
