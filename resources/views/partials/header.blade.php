@php
    $cartCount = app(\App\Services\CartService::class)->count();
@endphp

<header class="sticky top-0 z-50 bg-cream/95 backdrop-blur-md border-b border-gold/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 group min-w-0">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-gold flex items-center justify-center flex-shrink-0">
                    <span class="font-display text-gold text-base sm:text-lg font-semibold tracking-tight">PR</span>
                </div>
                <div class="min-w-0">
                    <span class="font-display text-lg sm:text-xl font-semibold tracking-wide text-ink block truncate">PERFECTA</span>
                    <span class="block text-[9px] sm:text-[10px] tracking-[0.25em] sm:tracking-[0.3em] text-gold-dark uppercase -mt-0.5">Regen</span>
                </div>
            </a>

            <nav class="hidden lg:flex items-center gap-8 xl:gap-10" aria-label="Main navigation">
                <a href="{{ route('home') }}#why-perfecta" class="text-sm text-muted hover:text-ink transition-colors">Why Perfecta</a>
                <a href="{{ route('home') }}#formula" class="text-sm text-muted hover:text-ink transition-colors">Formula</a>
                <a href="{{ route('home') }}#how-to-use" class="text-sm text-muted hover:text-ink transition-colors">How to Use</a>
                <a href="{{ route('product.show', 'collagen-peptides') }}" class="text-sm text-muted hover:text-ink transition-colors">Shop</a>
            </nav>

            <div class="flex items-center gap-1 sm:gap-3">
                <a href="{{ route('cart.index') }}" class="relative flex items-center justify-center w-11 h-11 text-ink hover:text-gold-dark transition-colors" aria-label="Shopping cart ({{ $cartCount }} items)">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    @if($cartCount > 0)
                        <span class="absolute top-1 right-1 w-4 h-4 sm:w-5 sm:h-5 bg-gold text-white text-[10px] sm:text-xs font-medium rounded-full flex items-center justify-center">{{ $cartCount }}</span>
                    @endif
                </a>
                <a href="{{ route('product.show', 'collagen-peptides') }}" class="btn-primary hidden md:inline-flex text-xs py-2.5 px-5 lg:py-3 lg:px-6">Shop Now</a>
                <button type="button" id="menu-toggle" class="menu-toggle flex lg:hidden" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav-panel">
                    <span class="menu-toggle-bar" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
</header>

<div id="mobile-nav-overlay" class="mobile-nav-overlay" aria-hidden="true"></div>
<nav id="mobile-nav-panel" class="mobile-nav-panel" aria-label="Mobile navigation">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-gold/10">
        <span class="section-label">Menu</span>
        <button type="button" id="menu-close" class="flex items-center justify-center w-10 h-10 text-ink hover:text-gold-dark transition-colors" aria-label="Close menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <a href="{{ route('home') }}#why-perfecta" class="mobile-nav-link">Why Perfecta</a>
    <a href="{{ route('home') }}#formula" class="mobile-nav-link">Formula</a>
    <a href="{{ route('home') }}#how-to-use" class="mobile-nav-link">How to Use</a>
    <a href="{{ route('product.show', 'collagen-peptides') }}" class="mobile-nav-link">Shop</a>
    <a href="{{ route('cart.index') }}" class="mobile-nav-link">Cart @if($cartCount > 0)({{ $cartCount }})@endif</a>
    <div class="mt-8 pt-6 border-t border-gold/10">
        <a href="{{ route('product.show', 'collagen-peptides') }}" class="btn-primary w-full">Shop Now</a>
    </div>
</nav>
