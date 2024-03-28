<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Group routes related to profiles
Route::prefix('profiles')->group(function () {
    Route::post('/', [ProfileController::class, 'store']);
    Route::get('/{username}', [ProfileController::class, 'show']);
    Route::put('/{username}', [ProfileController::class, 'update']);

    Route::post('/{username}/credit-cards', [ProfileController::class, 'storeCard']);
});
