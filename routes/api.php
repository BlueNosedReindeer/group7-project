<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookDetailController;

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
// book details routes
//Route::post('/book', 'BookDetailController@store');
//Route::get('books/{book}', [BookDetailController::class, 'show']);
//Route::get('books', [BookDetailController::class, 'index']);
Route::apiResource('books', BookDetailController::class);
Route::post('books/authors', [BookDetailController::class, 'createAuthor']);
//Route::post('books/{book}', [BookDetailController::class, 'store']);