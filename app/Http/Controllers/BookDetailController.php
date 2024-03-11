<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // store details when adding new
    { $validatedData = $request->validate([
        'isbn' => 'required|numeric',
        'title' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'publication_year' => 'required|numeric',
        'genre' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'copies_sold' => 'required|numeric',
        //
    ]);
    $book = new BookDetail();
    $book->isbn = $validatedData['isbn'];
    $book->title = $validatedData['title'];
    $book->author = $validatedData['author'];
    $book->publisher = $validatedData['publisher'];
    $book->publication_year = $validatedData['publication_year'];
    $book->genre = $validatedData['genre'];
    $book->description = $validatedData['description'];
    $book->price = $validatedData['price'];
    $book->copies_sold = $validatedData['copies_sold'];
    $book->save();

    return response()->json('Book details saved!');
}

    /**
     * Display the specified resource.
     */
    public function show($isbn): JsonResponse //
    {
        $book = BookDetail::where('isbn', $isbn->isbn)->first();

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookDetail $bookDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDetail $bookDetail)
    {
        //
    }
}
