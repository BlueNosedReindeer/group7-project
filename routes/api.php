<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;


Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    
});

Route::get('/user/{user}/cart', [CartController::class, 'index']); 
    Route::post('/user/{user}/cart', [CartController::class, 'add']);
    Route::delete('/user/{user}/cart/{item}', [CartController::class, 'remove']);