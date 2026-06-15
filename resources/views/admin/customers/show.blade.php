@extends('admin.layouts.app')

@section('title', $customer->name)
@section('page_title', $customer->name)

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.customers.index') }}" class="text-sm text-muted hover:text-ink transition-colors">&larr; Back to customers</a>
</div>

<div class="grid lg:grid-cols-3 gap-4 sm:gap-6 mb-6">
    <div class="admin-card p-4 sm:p-6">
        <div class="flex flex-col items-center text-center">
            <x-avatar :src="$customer->profile_image_url" :name="$customer->name" size="xl" class="mb-4" />
            <h2 class="font-display text-lg font-semibold text-ink">{{ $customer->name }}</h2>
            <p class="text-sm text-muted break-all">{{ $customer->email }}</p>
            @if($customer->phone)
                <p class="text-sm text-muted mt-1">{{ $customer->phone }}</p>
            @endif
        </div>

        <form action="{{ route('admin.customers.update-photo', $customer->email) }}" method="POST" enctype="multipart/form-data" class="mt-6 pt-6 border-t border-gold/10">
            @csrf
            <label for="profile_image" class="block text-sm font-medium text-ink mb-1.5">Profile Photo</label>
            <input type="file" name="profile_image" id="profile_image" accept="image/jpeg,image/png,image/webp,image/gif" required class="input-field file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-ink file:text-white file:text-xs file:uppercase mb-3">
            @error('profile_image')<p class="text-red-600 text-xs mt-1 mb-2">{{ $message }}</p>@enderror
            <button type="submit" class="btn-primary w-full text-xs">Upload Photo</button>
        </form>
    </div>

    <div class="lg:col-span-2 grid sm:grid-cols-2 gap-4">
        <div class="admin-stat-card">
            <p class="text-xs text-muted uppercase tracking-wider mb-1">Orders</p>
            <p class="font-display text-2xl font-semibold text-ink">{{ $customer->order_count }}</p>
        </div>
        <div class="admin-stat-card">
            <p class="text-xs text-muted uppercase tracking-wider mb-1">Total Spent</p>
            <p class="font-display text-2xl font-semibold text-ink">${{ number_format($customer->total_spent, 2) }}</p>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="p-4 sm:p-5 border-b border-gold/10">
        <h2 class="font-display text-lg font-semibold text-ink">Order History</h2>
    </div>
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="font-medium">{{ $order->order_number }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td><span class="status-badge status-{{ $order->status }}">{{ $order->status }}</span></td>
                        <td class="text-muted">{{ $order->created_at->format('M j, Y') }}</td>
                        <td><a href="{{ route('admin.orders.show', $order) }}" class="text-sm text-gold-dark hover:text-ink">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
