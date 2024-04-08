<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookRatingController;
use App\Http\Models\BookRating;
use App\Http\Models\CreateComment;

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

Route::post('CreateRating',[BookRatingController::class, 'CreateRating']);//adding a bookrating to database API -- POST METHOD-- 
Route::post('CreateComment',[BookRatingController::class, 'CreateComment']);
Route::get('ShowComments/{bookId}', [BookRatingController::class, 'ShowComments']);
Route::get('RatingAverage/{bookId}', [BookRatingController::class, 'RatingAverage']);