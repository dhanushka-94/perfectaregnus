@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<section class="py-8 sm:py-12 lg:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display heading-section font-semibold text-ink mb-2 sm:mb-3">Shopping Cart</h1>
        <div class="gold-line mb-8 sm:mb-10"></div>

        @if(empty($items))
            <div class="card-elevated p-8 sm:p-12 text-center">
                <p class="text-muted text-sm sm:text-base mb-6">Your cart is empty.</p>
                <a href="{{ route('product.show', 'collagen-peptides') }}" class="btn-primary max-w-xs mx-auto">Continue Shopping</a>
            </div>
        @else
            <div class="space-y-4 sm:space-y-6">
                @foreach($items as $productId => $item)
                    <div class="card-elevated p-4 sm:p-6">
                        <div class="cart-item-grid">
                            <div class="cart-item-image">
                                <img src="{{ image_url($item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 sm:w-24 sm:h-24 object-contain mx-auto sm:mx-0">
                            </div>
                            <div class="cart-item-details min-w-0">
                                <h2 class="font-display text-base sm:text-lg font-semibold text-ink leading-snug">{{ $item['name'] }}</h2>
                                <p class="text-gold-dark font-medium text-sm sm:text-base mt-1">${{ number_format($item['price'], 2) }} each</p>
                            </div>
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="cart-item-qty flex items-center gap-2 sm:gap-3">
                                @csrf
                                @method('PATCH')
                                <div class="qty-control" data-qty-control>
                                    <button type="button" class="qty-btn" data-qty-minus aria-label="Decrease">−</button>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="0" max="99" class="qty-input" data-qty-input aria-label="Quantity">
                                    <button type="button" class="qty-btn" data-qty-plus aria-label="Increase">+</button>
                                </div>
                                <button type="submit" class="text-xs sm:text-sm text-muted hover:text-ink transition-colors whitespace-nowrap">Update</button>
                            </form>
                            <p class="cart-item-price font-medium text-ink text-base sm:text-lg">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST" class="cart-item-remove">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs sm:text-sm text-muted hover:text-red-600 transition-colors">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 sm:mt-10 card-elevated p-5 sm:p-8">
                <div class="flex justify-between items-center mb-4 sm:mb-6">
                    <span class="text-muted text-sm sm:text-base">Subtotal</span>
                    <span class="font-display text-xl sm:text-2xl font-semibold text-ink">${{ number_format($subtotal, 2) }}</span>
                </div>
                <p class="text-xs sm:text-sm text-muted mb-5 sm:mb-6">Shipping calculated at checkout.</p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="{{ route('checkout.index') }}" class="btn-primary flex-1 text-center">Proceed to Checkout</a>
                    <a href="{{ route('product.show', 'collagen-peptides') }}" class="btn-outline flex-1 text-center">Continue Shopping</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
