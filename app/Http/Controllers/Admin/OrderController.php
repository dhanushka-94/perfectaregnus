<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public const STATUSES = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

    public function index(Request $request)
    {
        $query = Order::query()->latest();

        if ($request->filled('status') && in_array($request->status, self::STATUSES)) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('customer_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(15)->withQueryString();

        return view('admin.orders.index', [
            'orders' => $orders,
            'statuses' => self::STATUSES,
            'currentStatus' => $request->status,
            'search' => $request->search,
        ]);
    }

    public function show(Order $order)
    {
        $order->load('items');
        $customerProfile = Customer::where('email', $order->email)->first();

        return view('admin.orders.show', [
            'order' => $order,
            'statuses' => self::STATUSES,
            'customerProfile' => $customerProfile,
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', self::STATUSES),
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('admin.orders.show', $order)->with('success', 'Order status updated.');
    }

    public function transactions(Request $request)
    {
        $query = Order::query()->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $transactions = $query->paginate(15)->withQueryString();
        $totalRevenue = Order::whereNotIn('status', ['cancelled'])->sum('total');
        $search = $request->search;

        return view('admin.transactions.index', compact('transactions', 'totalRevenue', 'search'));
    }
}
