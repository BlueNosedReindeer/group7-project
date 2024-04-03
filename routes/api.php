<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BooksController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::apiResource('books', BooksController::class);
    Route::get('/books/genre/{genre}', [BooksController::class, 'findByGenre']);
    Route::get('topSellers', [BooksController::class, 'topSellers']);
    Route::get('books/filterByRating/{rating}', [BooksController::class, 'filterByRating']);
    Route::put('/books/discountByPublisher', [BooksController::class, 'discountByPublisher']);
    







