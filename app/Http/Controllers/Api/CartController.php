<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;

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

    public function add(Request $request, $user)
    {
        // Validate request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $cartItem = User::findOrFail($user)->carts()->create($validatedData);

        return response()->json(['message' => 'Item added to cart successfully'], 201);
    }

    public function remove($user, $item)
    {
        $cartItem = Cart::where('user_id', $user)->findOrFail($item);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart successfully']);
    }
}
