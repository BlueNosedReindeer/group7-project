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
    //split author name into first and last name
    $authorName = explode(' ', $validatedData['author'], 2);
    $firstName = $authorName[0];
    $lastName = $authorName[1] ?? '';
    //create author
    $author = Author::firstWhere([
    'first_name' => $firstName,
    'last_name' => $lastName,
    ]);

    if ($author === null) {
        return response()->json(['message' => 'Author does not exist! Please create Author Profile & Try Again! :)'], 404); 
    }
    //unset author from validated data
    unset($validatedData['author']);
    //set author_id to author's id
    $validatedData['author_id'] = $author->id;
    //create book
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
    }

    public function getBooks ($id) // get books by author
    {
      // Retrieve the author by their ID
    $author = Author::findOrFail($id);

    // Retrieve books associated with the author
    $books = $author->books;

    // Return the list of books
    return response()->json($books);
    }
    
    
    public function getAuthorbyID($id) // get author by id
    {
        $author = Author::where('id', $id)->firstOrFail();
        $books = $author->books;
        return response()->json([
            'message' => 'Author profile retrieved!',
            'author' => $author->books
        ]);

    }
}
