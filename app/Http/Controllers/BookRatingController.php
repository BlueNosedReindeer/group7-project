<?php

namespace App\Http\Controllers;

use App\Models\BookRating;
use Illuminate\Http\Request;

class BookRatingController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function CreateRating( Request $request)
    {
       // create a function that inserts data to data base ( create a book rating)
       $bookrating = new BookRating; 
       $bookrating->Rating=$request->Rating;
       $bookrating->userId=$request->userId;
       $bookrating->bookId=$request->bookId;
       $bookrating->save();
       return ["Data saved ! "];
       }



    /**
     * Display the specified resource.
     */
    public function show()// put this back in parameter BookRating $bookRating
    {
        //
        return view('bookRating');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookRating $bookRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRating $bookRating)
    {
        //
    }
}
