<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Profile;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($profile)
    {
        $cartItems = Profile::findOrFail($profile)->carts;
        $subtotal = $cartItems->sum('price');

        return response()->json([
            'cartItems' => $cartItems,
            'subtotal' => $subtotal
        ]);
    }

    public function add(Request $request, $profile, $item)
{
    $profileModel = Profile::findOrFail($profile); // profile id

    $book = Book::findOrFail($item); // book id

    $profileModel->carts()->create([
        'book_id' => $book->id,
        'title' => $book->title,
        'author' => $book->author,
        'price' => $book->price,
    ]);

    return response()->json(['message' => 'Item added to cart'], 201);
}


    public function remove($profile, $item)
    {
        $cartItem = Cart::where('profile_id', $profile)->findOrFail($item);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
