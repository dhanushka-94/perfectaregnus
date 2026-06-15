<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    private const SHIPPING_COST = 5.99;

    public function index(CartService $cart)
    {
        if (empty($cart->items())) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', [
            'items' => $cart->items(),
            'subtotal' => $cart->subtotal(),
            'shipping' => self::SHIPPING_COST,
            'total' => $cart->subtotal() + self::SHIPPING_COST,
        ]);
    }

    public function store(Request $request, CartService $cart)
    {
        if (empty($cart->items())) {
            return redirect()->route('home')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'notes' => 'nullable|string|max:500',
            'agree_privacy' => 'accepted',
            'agree_terms' => 'accepted',
        ], [
            'agree_privacy.accepted' => 'You must agree to the Privacy Policy to place your order.',
            'agree_terms.accepted' => 'You must agree to the Terms & Conditions to place your order.',
        ]);

        $subtotal = $cart->subtotal();
        $shipping = self::SHIPPING_COST;
        $total = $subtotal + $shipping;

        $order = Order::create([
            'order_number' => 'PR-' . strtoupper(Str::random(8)),
            'customer_name' => $validated['customer_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
            'country' => $validated['country'],
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ]);

        foreach ($cart->items() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);

            Product::where('id', $item['product_id'])->decrement('stock', $item['quantity']);
        }

        Customer::syncFromOrder($order);

        $cart->clear();

        return redirect()->route('checkout.success', $order->order_number);
    }

    public function success(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
