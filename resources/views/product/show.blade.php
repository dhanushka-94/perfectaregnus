@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section class="py-8 sm:py-12 lg:py-20 pb-24 lg:pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="breadcrumb text-muted mb-6 sm:mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-ink transition-colors">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink">Shop</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20">
            <div class="flex justify-center items-start lg:sticky lg:top-28 lg:self-start w-full max-w-lg">
                <img src="{{ $product->image_url }}"
                    alt="{{ $product->name }}"
                    class="w-full object-contain"
                    width="500"
                    height="500">
            </div>

            <div>
                <p class="section-label mb-2">Dietary Supplement</p>
                <h1 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">{{ $product->name }}</h1>
                <div class="gold-line mb-4 sm:mb-6"></div>
                <p class="text-muted text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">{{ $product->short_description }}</p>
                <p class="font-display text-2xl sm:text-3xl text-gold-dark font-semibold mb-1">${{ number_format($product->price, 2) }}</p>
                <p class="text-xs sm:text-sm text-muted mb-6 sm:mb-8">30 Servings &middot; Net W. 321g (11.32oz)</p>

                <div id="product-actions">
                    @if($product->stock > 0)
                        <form action="{{ route('product.add-to-cart', $product->slug) }}" method="POST" class="mb-8 sm:mb-10">
                            @csrf
                            <div class="flex flex-col xs:flex-row xs:items-center gap-3 sm:gap-4 mb-5 sm:mb-6">
                                <label for="quantity" class="text-sm font-medium text-ink">Quantity</label>
                                <div class="qty-control" data-qty-control>
                                    <button type="button" class="qty-btn" data-qty-minus aria-label="Decrease quantity">−</button>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="qty-input" data-qty-input aria-label="Quantity">
                                    <button type="button" class="qty-btn" data-qty-plus aria-label="Increase quantity">+</button>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                                <button type="submit" class="btn-primary flex-1">Add to Cart</button>
                                <a href="{{ route('cart.index') }}" class="btn-outline flex-1 text-center">View Cart</a>
                            </div>
                        </form>
                    @else
                        <p class="text-red-600 text-sm sm:text-base mb-8 sm:mb-10">Currently out of stock.</p>
                    @endif
                </div>

                <div class="border-t border-gold/10 pt-6 sm:pt-8">
                    <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4">Key Ingredients</h2>
                    <ul class="grid grid-cols-1 xs:grid-cols-2 gap-2 sm:gap-3">
                        @foreach($product->features ?? [] as $feature)
                            <li class="flex items-center text-muted text-xs sm:text-sm">
                                <span class="check-item">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 sm:mt-16 lg:mt-24">
            <h2 class="font-display text-xl sm:text-2xl font-semibold text-ink mb-3 sm:mb-4">Product Description</h2>
            <div class="gold-line mb-4 sm:mb-6"></div>
            <p class="text-muted text-sm sm:text-base leading-relaxed max-w-3xl">{{ $product->description }}</p>
        </div>

        <div class="mt-10 sm:mt-16 card-elevated p-5 sm:p-8 lg:p-10">
            <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4 sm:mb-6">Supplement Facts</h2>
            <div class="table-responsive">
                <table class="w-full text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-gold/20">
                            <th class="text-left py-2 sm:py-3 font-medium text-ink pr-4">Ingredient</th>
                            <th class="text-right py-2 sm:py-3 font-medium text-ink whitespace-nowrap">Amount</th>
                            <th class="text-right py-2 sm:py-3 font-medium text-ink whitespace-nowrap pl-4">% DV</th>
                        </tr>
                    </thead>
                    <tbody class="text-muted">
                        <tr class="border-b border-gold/10"><td class="py-2 sm:py-3 pr-4">Vitamin C (Ascorbic Acid)</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">200 mg</td><td class="text-right py-2 sm:py-3 pl-4">200%</td></tr>
                        <tr class="border-b border-gold/10"><td class="py-2 sm:py-3 pr-4">Biotin</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">300 mcg</td><td class="text-right py-2 sm:py-3 pl-4">1000%</td></tr>
                        <tr class="border-b border-gold/10"><td class="py-2 sm:py-3 pr-4">Zinc (Zinc Citrate)</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">10 mg</td><td class="text-right py-2 sm:py-3 pl-4">91%</td></tr>
                        <tr class="border-b border-gold/10"><td class="py-2 sm:py-3 pr-4">Selenium (Selenomethionine)</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">100 mcg</td><td class="text-right py-2 sm:py-3 pl-4">182%</td></tr>
                        <tr class="border-b border-gold/10"><td class="py-2 sm:py-3 pr-4">Chicken Collagen Type I</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">10,000 mg</td><td class="text-right py-2 sm:py-3 pl-4">—</td></tr>
                        <tr><td class="py-2 sm:py-3 pr-4">Hyaluronic Acid</td><td class="text-right py-2 sm:py-3 whitespace-nowrap">150 mg</td><td class="text-right py-2 sm:py-3 pl-4">—</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="table-scroll-hint">Swipe to see full table</p>
            <p class="text-xs text-muted mt-4 sm:mt-6">Serving Size: 10.7g &middot; Servings Per Container: 30</p>
            <p class="text-xs text-muted mt-2">Suggested Use: Blend 2 scoops with 10oz of water or as directed by a health professional.</p>
        </div>
    </div>
</section>

@if($product->stock > 0)
<div id="mobile-buy-bar" class="mobile-buy-bar lg:hidden">
    <div class="flex items-center gap-3 max-w-7xl mx-auto">
        <div class="flex-1 min-w-0">
            <p class="font-display text-base font-semibold text-ink truncate">${{ number_format($product->price, 2) }}</p>
            <p class="text-xs text-muted truncate">30 Servings</p>
        </div>
        <form action="{{ route('product.add-to-cart', $product->slug) }}" method="POST" class="flex-shrink-0">
            @csrf
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn-primary py-3 px-6 text-xs whitespace-nowrap">Add to Cart</button>
        </form>
    </div>
</div>
@endif
@endsection
