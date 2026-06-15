<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(CartService $cart)
    {
        return view('cart.index', [
            'items' => $cart->items(),
            'subtotal' => $cart->subtotal(),
        ]);
    }

    public function update(Request $request, CartService $cart, int $productId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0|max:99',
        ]);

        $cart->update($productId, $validated['quantity']);

        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function remove(CartService $cart, int $productId)
    {
        $cart->remove($productId);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
