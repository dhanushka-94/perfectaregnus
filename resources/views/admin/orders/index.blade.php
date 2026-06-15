@extends('admin.layouts.app')

@section('title', 'Orders')
@section('page_title', 'Orders')

@section('content')
<div class="admin-card mb-4 sm:mb-6 p-4 sm:p-5">
    <form method="GET" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search order, customer, email..." class="input-field flex-1">
        <select name="status" class="input-field sm:w-40">
            <option value="">All statuses</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}" {{ $currentStatus === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-primary sm:w-auto">Filter</button>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="font-medium">{{ $order->order_number }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td class="text-muted">{{ $order->email }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td><span class="status-badge status-{{ $order->status }}">{{ $order->status }}</span></td>
                        <td class="text-muted whitespace-nowrap">{{ $order->created_at->format('M j, Y g:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-sm text-gold-dark hover:text-ink">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-10">No orders found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($orders->hasPages())
        <div class="p-4 border-t border-gold/10">{{ $orders->links() }}</div>
    @endif
</div>
@endsection
