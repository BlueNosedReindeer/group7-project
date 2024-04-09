<?php

namespace App\Http\Controllers;

use App\Models\CreateComment;
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
       return ["Book Rating saved ! "];
       }

       public function CreateComment( Request $request)
       {
          // create a function that inserts data to data base ( create a book rating)
          $bookcomment = new CreateComment; 
          $bookcomment->Comment=$request->Comment;
          $bookcomment->userId=$request->userId;
          $bookcomment->bookId=$request->bookId;
          $bookcomment->save();
          return ["Comment saved ! "];
          }



    /**
     * Display the specified resource.
     */
    public function ShowComments($bookId)
    {
        $Comment = CreateComment::where('bookId', $bookId)->get(['Comment']);
    
        return response()->json($Comment);
    }

    public function RatingAverage($bookId)
    {
       $average = BookRating::where('bookId', $bookId)->avg('Rating');

       

       return response()->json("The average book rating of bookId $bookId is : $average out of 5");
    }
        

   
}
