<?php

use App\Http\Controllers\ProductApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;

// Public route for login
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    // Profile route
    Route::get('/profile', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
        ]);
    });

    // Logout route (revoke the access token)
    Route::post('/logout', [AuthController::class, 'logout']);

    // Product routes
    Route::apiResource('products', ProductApiController::class);
});