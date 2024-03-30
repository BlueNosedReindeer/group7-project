<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Book;

class CartController extends Controller
{
    public function index($user)
    {
        $cartItems = User::findOrFail($user)->carts;
        $subtotal = $cartItems->sum('price');
        
        return response()->json([
            'cartItems' => $cartItems,
            'subtotal' => $subtotal
        ]);
    }

    public function add(Request $request, $user, $item)
{
    $userModel = User::findOrFail($user); // user id

    $book = Book::findOrFail($item); // book id

    $cartItem = $userModel->carts()->create([
        'book_id' => $book->id,
        'title' => $book->title,
        'author' => $book->author,
        'price' => $book->price,
    ]);

    return response()->json(['message' => 'Item added to cart'], 201);
}


    public function remove($user, $item)
    {
        $cartItem = Cart::where('user_id', $user)->findOrFail($item);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed']);
    }
}
