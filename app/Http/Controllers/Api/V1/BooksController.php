<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Books::all();
    }

/**
     * Retrieve books by Genre.
     */
    public function findByGenre($genre)
    {
        // Retrieve the books with the specified genre
        $books = Books::where('Genre', $genre)->get();
    
        return $books;
    }

    /**
     * Retrieve the top-selling books.
     */
    public function topSellers()
    {
        $topSellers = Books::orderByDesc('Number Sold')
                           ->take(10)
                           ->get();

        return $topSellers;
    }
 /**
 * Retrieve a list of books for a particular rating and higher.
 */
public function filterByRating($rating)
{
    // Validate the rating
    if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
        return response()->json(['error' => 'Invalid rating value. Rating must be a number between 1 and 5.'], 400);
    }

    // Retrieve the books with a rating higher or equal to the provided rating
    $books = Books::where('Rating', '>=', $rating)->get();

    return response()->json($books);
}

/**
 * Discount books by publisher
 */
 
 public function discountByPublisher(Request $request)
 {
     // Validate the request parameters
     dd('hi');
     $request->validate([
         'discount_percent' => 'required|numeric|min:0|max:100', // Assuming discount percent is between 0 and 100
         'publisher' => 'required|string', // Assuming publisher is a string
     ]);

     // Retrieve discount percent and publisher from the request
     $discountPercent = $request->input('discount_percent');
     $publisher = $request->input('publisher');
 
     // Apply the discount to books under the specified publisher
     $books = Book::where('publisher', $publisher)->get();

     foreach ($books as $book) {
         $book->price = $book->price * $discountPercent;
         $book->save();
     }
 
     // Optionally, you can return a response indicating success
     return response()->json(['message' => 'Books discounted successfully']);
 }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        //
    }
}
