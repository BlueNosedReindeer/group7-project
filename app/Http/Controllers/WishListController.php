<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\WishList;
use App\Models\Profile;

use Illuminate\Http\Request;

class WishListController extends Controller
{

    public function createWishlist($profile, $name)// create a new wishlist with the given name
    {
        $profileModel = Profile::findOrFail($profile); // profile id

        $profileModel->wishes()->create(['wishlist_id' =>$name]);


        return response()->json(['message' => 'Wishlist Created'], 201);
    }
    

    public function addWish(Request $request, $wishlist, $item) //add a new book's id to the given wishlist
    {

        $wlist = WishList::findOrFail($wishlist); //wishlist id
        $book = Book::findOrFail($item); // book id
        
        $wlist->entries->create[('book_id'->$book)]; 

        
    
        return response()->json(['message' => 'Item added to wishlist'], 201);
    }

    public function removeWish($profile, $wishlist, $item)
    {
        $pro = Profile::findOrFail($profile);
        $lis = $pro->wishes()->findOrFail($wishlist);
        $wishItem = $lis->entries()->findOrFail($item);
        $wishItem->delete();
    }

    

    public function viewWishes($list) // returns a list of books associated with the given wishlist
    {
        $wlist = WishList::findOrFail($list); //wishlist id

        $entries = $wlist->WishEntries; // Get all child entries for the given list

        $entryArr = (array)$entries->getID(); // Gets array of ids
        
        
        
        $wishBooks = [];  //a new array for the actual books
        foreach ($entryArr as $val) {
            array_push(wishBooks, Book::findOrFail($val));
        }
        
        return view('wishlist', $wishBooks); 
        //response()->json_encode($wishBooks, 0, 512);
    }

    /*
    public function viewWishes($profile) // returns a json list of all books with their ids in the list
    {
        $lists = (array)getLists($profile);
        
        foreach ($lists as $li) {
            $temp = (array)getBooks($li);
            array_unshift($li);
            $li = (array)$temp;
        }

        return response()->json_encode($lists, 0, 512);
    }
    
    private function getLists($profile) // returns an array of all wishlists registered under this profile
    {
        $lists = Profile::findOrFail($profile)->wishes;
        return (array)$lists;
    }


    private function getBooks($list) // returns a list of books associated with the given wishlist
    {
        $wlist = WishList::findOrFail($list); //wishlist id

        $entries = $wlist->WishEntries; // Get all child entries for the given list

        $entryArr = (array)$entries->getID(); // Gets array of ids
        
        
        
        $wishBooks = [];  //a new array for the actual books
        foreach ($entryArr as $val) {
            array_push(wishBooks, Book::findOrFail($val));
        }
        
        return $wishbooks;
    }
    */

}
