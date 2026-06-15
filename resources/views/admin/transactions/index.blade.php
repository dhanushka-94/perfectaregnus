@extends('admin.layouts.app')

@section('title', 'Transactions')
@section('page_title', 'Transactions')

@section('content')
<div class="admin-stat-card mb-4 sm:mb-6 inline-block">
    <p class="text-xs text-muted uppercase tracking-wider mb-1">Total Revenue</p>
    <p class="font-display text-2xl sm:text-3xl font-semibold text-ink">${{ number_format($totalRevenue, 2) }}</p>
</div>

<div class="admin-card mb-4 sm:mb-6 p-4 sm:p-5">
    <form method="GET" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search order or email..." class="input-field flex-1">
        <button type="submit" class="btn-primary sm:w-auto">Search</button>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $order)
                    <tr>
                        <td class="font-medium">{{ $order->order_number }}</td>
                        <td>
                            <div>{{ $order->customer_name }}</div>
                            <div class="text-xs text-muted">{{ $order->email }}</div>
                        </td>
                        <td class="font-medium">${{ number_format($order->total, 2) }}</td>
                        <td><span class="status-badge status-{{ $order->status }}">{{ $order->status }}</span></td>
                        <td class="text-muted whitespace-nowrap">{{ $order->created_at->format('M j, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-sm text-gold-dark hover:text-ink">Details</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-10">No transactions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($transactions->hasPages())
        <div class="p-4 border-t border-gold/10">{{ $transactions->links() }}</div>
    @endif
</div>
@endsection
