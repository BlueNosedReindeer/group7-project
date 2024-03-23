<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(BookDetail::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // store details when adding new
    { 
        $validatedData = $request->validate([
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
    $book = BookDetail::create($validatedData);

    return response()->json(['message' => 'Book details saved!', 'book' => $book], 201);
}

    /**
     * Display the specified resource.
     */
    public function show($isbn) //
    {
        return BookDetail::where('isbn', $isbn)->firstOrFail();

    }

    public function createAuthor(Request $request) // creating author profile
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'biography' => 'required',
            'publisher' => 'required',
        ]);
        $author = Author::create($validatedData);
        return response()->json(['message' => 'Author profile created!', 'author' => $author], 201);
        // return BookDetail::where('author', $author)->firstOrFail();

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
