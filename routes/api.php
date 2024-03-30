<?php

use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\CartController;
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

    Route::get('/{username}/cart', [CartController::class, 'index']);
    Route::post('/{username}/cart/{item}', [CartController::class, 'add']);
    Route::delete('/{username}/cart/{item}', [CartController::class, 'remove']);
});


// Book details routes
Route::apiResource('books', BookDetailController::class);
Route::post('books/authors', [BookDetailController::class, 'createAuthor']);
Route::get('authors/{id}', [BookDetailController::class, 'getAuthorByID']);
Route::get('authors/{id}/books', [BookDetailController::class, 'getBooks']);
