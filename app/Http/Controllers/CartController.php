<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::all();
        $subtotal = Cart::sum('price');
        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $book = Book::find($request->id);
        
        $cartItem = Cart::create([
            'title' => $book->title,
            'author' => $book->author,
            'price' => $book->price
        ]);

        return redirect('/cart');
    }

    public function remove(Request $request)
    {
        $cartItem = Cart::find($request->id);
        $cartItem->delete();

        return redirect('/cart');
    }
}
