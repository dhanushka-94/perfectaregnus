<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_revenue' => Order::whereNotIn('status', ['cancelled'])->sum('total'),
            'total_customers' => Order::distinct('email')->count('email'),
            'low_stock' => Product::where('stock', '<', 20)->count(),
        ];

        $recentOrders = Order::latest()->take(8)->get();

        $monthlyRevenue = Order::whereNotIn('status', ['cancelled'])
            ->where('created_at', '>=', now()->subMonths(6))
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('SUM(total) as revenue'),
                DB::raw('COUNT(*) as orders')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'monthlyRevenue'));
    }
}
