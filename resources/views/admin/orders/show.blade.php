@extends('admin.layouts.app')

@section('title', 'Order ' . $order->order_number)
@section('page_title', 'Order ' . $order->order_number)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.orders.index') }}" class="text-sm text-muted hover:text-ink transition-colors">&larr; Back to orders</a>
</div>

<div class="grid lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="lg:col-span-2 space-y-4 sm:space-y-6">
        <div class="admin-card p-4 sm:p-6">
            <h2 class="font-display text-lg font-semibold text-ink mb-4">Order Items</h2>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->unit_price, 2) }}</td>
                                <td>${{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 pt-4 border-t border-gold/10 space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-muted">Subtotal</span><span>${{ number_format($order->subtotal, 2) }}</span></div>
                <div class="flex justify-between"><span class="text-muted">Shipping</span><span>${{ number_format($order->shipping, 2) }}</span></div>
                <div class="flex justify-between font-semibold text-base"><span>Total</span><span>${{ number_format($order->total, 2) }}</span></div>
            </div>
        </div>

        @if($order->notes)
            <div class="admin-card p-4 sm:p-6">
                <h2 class="font-display text-lg font-semibold text-ink mb-2">Customer Notes</h2>
                <p class="text-sm text-muted">{{ $order->notes }}</p>
            </div>
        @endif
    </div>

    <div class="space-y-4 sm:space-y-6">
        <div class="admin-card p-4 sm:p-6">
            <h2 class="font-display text-lg font-semibold text-ink mb-4">Status</h2>
            <p class="mb-4"><span class="status-badge status-{{ $order->status }}">{{ $order->status }}</span></p>
            <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="space-y-3">
                @csrf
                @method('PATCH')
                <select name="status" class="input-field">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-primary w-full">Update Status</button>
            </form>
        </div>

        <div class="admin-card p-4 sm:p-6">
            <h2 class="font-display text-lg font-semibold text-ink mb-4">Customer</h2>
            <div class="flex items-center gap-3 mb-4">
                <x-avatar :src="$customerProfile?->profile_image_url" :name="$order->customer_name" size="md" />
                <div>
                    <p class="font-medium text-ink">{{ $order->customer_name }}</p>
                    <a href="{{ route('admin.customers.show', $order->email) }}" class="text-sm text-gold-dark hover:text-ink">{{ $order->email }}</a>
                </div>
            </div>
            <dl class="space-y-3 text-sm">
                @if($order->phone)<div><dt class="text-muted text-xs uppercase tracking-wider mb-0.5">Phone</dt><dd>{{ $order->phone }}</dd></div>@endif
            </dl>
        </div>

        <div class="admin-card p-4 sm:p-6">
            <h2 class="font-display text-lg font-semibold text-ink mb-4">Shipping Address</h2>
            <p class="text-sm text-muted leading-relaxed">
                {{ $order->address }}<br>
                {{ $order->city }}, {{ $order->state }} {{ $order->zip }}<br>
                {{ $order->country }}
            </p>
        </div>

        <div class="admin-card p-4 sm:p-6">
            <h2 class="font-display text-lg font-semibold text-ink mb-4">Details</h2>
            <dl class="space-y-3 text-sm">
                <div><dt class="text-muted text-xs uppercase tracking-wider mb-0.5">Placed</dt><dd>{{ $order->created_at->format('M j, Y g:i A') }}</dd></div>
                <div><dt class="text-muted text-xs uppercase tracking-wider mb-0.5">Order ID</dt><dd>{{ $order->order_number }}</dd></div>
            </dl>
        </div>
    </div>
</div>
@endsection
