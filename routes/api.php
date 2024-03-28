<?php

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

// book details routes
Route::apiResource('books', BookDetailController::class);
Route::post('books/authors', [BookDetailController::class, 'createAuthor']);
Route::get('authors/{id}', [BookDetailController::class, 'getAuthorByID']);
Route::get('authors/{id}/books', [BookDetailController::class, 'getBooks']);

