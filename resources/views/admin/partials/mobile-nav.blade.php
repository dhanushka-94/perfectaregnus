@php
    $navItems = [
        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'match' => 'admin.dashboard'],
        ['route' => 'admin.orders.index', 'label' => 'Orders', 'match' => 'admin.orders.*'],
        ['route' => 'admin.transactions.index', 'label' => 'Transactions', 'match' => 'admin.transactions.*'],
        ['route' => 'admin.customers.index', 'label' => 'Customers', 'match' => 'admin.customers.*'],
        ['route' => 'admin.products.edit', 'label' => 'Product', 'match' => 'admin.products.*'],
        ['route' => 'admin.profile.edit', 'label' => 'Profile', 'match' => 'admin.profile.*'],
    ];
@endphp

<nav class="admin-mobile-nav mb-4 sm:mb-6" aria-label="Admin navigation">
    @foreach($navItems as $item)
        <a href="{{ route($item['route']) }}"
           class="{{ request()->routeIs($item['match']) ? 'is-active' : '' }}">
            {{ $item['label'] }}
        </a>
    @endforeach
</nav>
