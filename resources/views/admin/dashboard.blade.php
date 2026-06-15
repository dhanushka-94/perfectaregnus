@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-5 gap-3 sm:gap-4 mb-6 sm:mb-8">
    <div class="admin-stat-card col-span-1">
        <p class="text-xs text-muted uppercase tracking-wider mb-1">Orders</p>
        <p class="font-display text-2xl sm:text-3xl font-semibold text-ink">{{ $stats['total_orders'] }}</p>
    </div>
    <div class="admin-stat-card col-span-1">
        <p class="text-xs text-muted uppercase tracking-wider mb-1">Pending</p>
        <p class="font-display text-2xl sm:text-3xl font-semibold text-gold-dark">{{ $stats['pending_orders'] }}</p>
    </div>
    <div class="admin-stat-card col-span-2 lg:col-span-1">
        <p class="text-xs text-muted uppercase tracking-wider mb-1">Revenue</p>
        <p class="font-display text-2xl sm:text-3xl font-semibold text-ink">${{ number_format($stats['total_revenue'], 2) }}</p>
    </div>
    <div class="admin-stat-card col-span-1">
        <p class="text-xs text-muted uppercase tracking-wider mb-1">Customers</p>
        <p class="font-display text-2xl sm:text-3xl font-semibold text-ink">{{ $stats['total_customers'] }}</p>
    </div>
    <div class="admin-stat-card col-span-1">
        <p class="text-xs text-muted uppercase tracking-wider mb-1">Low Stock</p>
        <p class="font-display text-2xl sm:text-3xl font-semibold {{ $stats['low_stock'] > 0 ? 'text-red-600' : 'text-ink' }}">{{ $stats['low_stock'] }}</p>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="lg:col-span-2 admin-card">
        <div class="p-4 sm:p-5 border-b border-gold/10 flex items-center justify-between">
            <h2 class="font-display text-lg font-semibold text-ink">Recent Orders</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-xs sm:text-sm text-gold-dark hover:text-ink transition-colors">View all</a>
        </div>
        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                        <tr>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-ink hover:text-gold-dark font-medium">{{ $order->order_number }}</a>
                            </td>
                            <td class="text-muted">{{ $order->customer_name }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td><span class="status-badge status-{{ $order->status }}">{{ $order->status }}</span></td>
                            <td class="text-muted whitespace-nowrap">{{ $order->created_at->format('M j, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-8">No orders yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="admin-card">
        <div class="p-4 sm:p-5 border-b border-gold/10">
            <h2 class="font-display text-lg font-semibold text-ink">Monthly Revenue</h2>
        </div>
        <div class="p-4 sm:p-5 space-y-3">
            @forelse($monthlyRevenue as $row)
                <div class="flex justify-between items-center text-sm">
                    <span class="text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m', $row->month)->format('M Y') }}</span>
                    <span class="font-medium text-ink">${{ number_format($row->revenue, 2) }}</span>
                </div>
            @empty
                <p class="text-sm text-muted">No revenue data yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
