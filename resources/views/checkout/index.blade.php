@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<section class="py-8 sm:py-12 lg:py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display heading-section font-semibold text-ink mb-2 sm:mb-3">Checkout</h1>
        <div class="gold-line mb-8 sm:mb-10"></div>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid lg:grid-cols-5 gap-6 sm:gap-8 lg:gap-12">
                {{-- Order summary first on mobile --}}
                <div class="lg:col-span-2 order-1 lg:order-2">
                    <div class="card-elevated p-5 sm:p-8 lg:sticky lg:top-28">
                        <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4 sm:mb-6">Order Summary</h2>
                        <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6">
                            @foreach($items as $item)
                                <div class="flex justify-between gap-4 text-xs sm:text-sm">
                                    <span class="text-muted flex-1 min-w-0">{{ $item['name'] }} &times; {{ $item['quantity'] }}</span>
                                    <span class="text-ink flex-shrink-0">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-t border-gold/10 pt-4 space-y-2 text-xs sm:text-sm">
                            <div class="flex justify-between">
                                <span class="text-muted">Subtotal</span>
                                <span>${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted">Shipping</span>
                                <span>${{ number_format($shipping, 2) }}</span>
                            </div>
                            <div class="flex justify-between font-display text-lg sm:text-xl font-semibold text-ink pt-2">
                                <span>Total</span>
                                <span>${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn-primary w-full mt-6 sm:mt-8 hidden lg:flex">Place Order</button>
                        <p class="text-xs text-muted text-center mt-3 sm:mt-4 hidden lg:block">Payment collected upon fulfillment.</p>
                    </div>
                </div>

                <div class="lg:col-span-3 order-2 lg:order-1 space-y-4 sm:space-y-6">
                    <div class="card-elevated p-5 sm:p-8">
                        <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4 sm:mb-6">Contact Information</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="sm:col-span-2">
                                <label for="customer_name" class="block text-sm font-medium text-ink mb-1.5">Full Name</label>
                                <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required class="input-field @error('customer_name') border-red-400 @enderror" autocomplete="name">
                                @error('customer_name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="input-field @error('email') border-red-400 @enderror" autocomplete="email">
                                @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-ink mb-1.5">Phone <span class="text-muted font-normal">(optional)</span></label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="input-field" autocomplete="tel">
                            </div>
                        </div>
                    </div>

                    <div class="card-elevated p-5 sm:p-8">
                        <h2 class="font-display text-lg sm:text-xl font-semibold text-ink mb-4 sm:mb-6">Shipping Address</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="address" class="block text-sm font-medium text-ink mb-1.5">Street Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address') }}" required class="input-field @error('address') border-red-400 @enderror" autocomplete="street-address">
                                @error('address')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="grid grid-cols-1 xs:grid-cols-2 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-ink mb-1.5">City</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" required class="input-field @error('city') border-red-400 @enderror" autocomplete="address-level2">
                                    @error('city')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-ink mb-1.5">State</label>
                                    <input type="text" name="state" id="state" value="{{ old('state') }}" required class="input-field @error('state') border-red-400 @enderror" autocomplete="address-level1">
                                    @error('state')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 xs:grid-cols-2 gap-4">
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-ink mb-1.5">ZIP Code</label>
                                    <input type="text" name="zip" id="zip" value="{{ old('zip') }}" required class="input-field @error('zip') border-red-400 @enderror" autocomplete="postal-code">
                                    @error('zip')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="country" class="block text-sm font-medium text-ink mb-1.5">Country</label>
                                    <input type="text" name="country" id="country" value="{{ old('country', 'US') }}" required class="input-field" autocomplete="country-name">
                                </div>
                            </div>
                            <div>
                                <label for="notes" class="block text-sm font-medium text-ink mb-1.5">Order Notes <span class="text-muted font-normal">(optional)</span></label>
                                <textarea name="notes" id="notes" rows="3" class="input-field">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Mobile submit button --}}
                    <div class="lg:hidden">
                        <button type="submit" class="btn-primary w-full">Place Order — ${{ number_format($total, 2) }}</button>
                        <p class="text-xs text-muted text-center mt-3">Payment collected upon fulfillment.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
