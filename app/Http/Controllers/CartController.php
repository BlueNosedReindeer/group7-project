<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // index: show all books in cart and calculate subtotal
    public function index()
    {
        $books = Cart::all();
        $subtotal = Cart::sum('price');
        return view('cart', compact('books', 'subtotal'));
    }

    // store: add book to cart
    public function store(Request $request)
    {
        $book = Book::find($request->id);
        Cart::create([
            'title' => $book->title,
            'price' => $book->price,
            // Fill in rest
        ]);
        return redirect()->route('cart');
    }

    // destroy:remove book from cart
    public function destroy($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart');
    }
}
