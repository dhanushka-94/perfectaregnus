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

<aside class="admin-sidebar">
    <div class="admin-sidebar-brand">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full border border-gold flex items-center justify-center">
                <span class="font-display text-gold text-sm font-semibold">PR</span>
            </div>
            <div>
                <span class="font-display text-lg font-semibold">PERFECTA</span>
                <span class="block text-[9px] tracking-[0.25em] text-gold uppercase -mt-0.5">Admin</span>
            </div>
        </div>
    </div>
    <nav class="flex-1 py-4">
        @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="admin-nav-link {{ request()->routeIs($item['match']) ? 'is-active' : '' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>
    <div class="p-4 border-t border-white/10">
        <p class="text-[10px] text-white/30">olexto Digital Solutions</p>
    </div>
</aside>
