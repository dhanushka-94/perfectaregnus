@extends('admin.layouts.app')

@section('title', 'Customers')
@section('page_title', 'Customers')

@section('content')
<div class="admin-card mb-4 sm:mb-6 p-4 sm:p-5">
    <form method="GET" class="flex flex-col sm:flex-row gap-3">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search name or email..." class="input-field flex-1">
        <button type="submit" class="btn-primary sm:w-auto">Search</button>
    </form>
</div>

<div class="admin-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Orders</th>
                    <th>Total Spent</th>
                    <th>Last Order</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    @php $profile = $profiles[$customer->email] ?? null; @endphp
                    <tr>
                        <td>
                            <div class="flex items-center gap-3">
                                <x-avatar :src="$profile?->profile_image_url" :name="$customer->customer_name" size="sm" />
                                <span class="font-medium">{{ $customer->customer_name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $customer->email }}</td>
                        <td class="text-muted">{{ $customer->phone ?? '—' }}</td>
                        <td>{{ $customer->order_count }}</td>
                        <td>${{ number_format($customer->total_spent, 2) }}</td>
                        <td class="text-muted whitespace-nowrap">{{ \Carbon\Carbon::parse($customer->last_order_at)->format('M j, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.customers.show', $customer->email) }}" class="text-sm text-gold-dark hover:text-ink">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-10">No customers yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($customers->hasPages())
        <div class="p-4 border-t border-gold/10">{{ $customers->links() }}</div>
    @endif
</div>
@endsection
