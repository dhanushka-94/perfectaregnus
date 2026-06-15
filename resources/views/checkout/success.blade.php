@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')
<section class="py-12 sm:py-16 lg:py-24">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full border-2 border-gold flex items-center justify-center mx-auto mb-6 sm:mb-8">
            <span class="check-item scale-125 sm:scale-150"></span>
        </div>
        <p class="section-label mb-2 sm:mb-3">Thank You</p>
        <h1 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">Order Confirmed</h1>
        <div class="gold-line-wide mx-auto mb-5 sm:mb-6"></div>
        <p class="text-muted text-sm sm:text-base mb-2">Your order number is</p>
        <p class="font-display text-xl sm:text-2xl text-gold-dark font-semibold mb-6 sm:mb-8 break-all px-4">{{ $order->order_number }}</p>
        <p class="text-muted text-sm sm:text-base leading-relaxed mb-8 sm:mb-10 px-2">
            A confirmation will be sent to <strong class="text-ink">{{ $order->email }}</strong>. We will process your order shortly.
        </p>

        <div class="card-elevated p-5 sm:p-8 text-left mb-8 sm:mb-10">
            <h2 class="font-display text-base sm:text-lg font-semibold text-ink mb-4">Order Details</h2>
            @foreach($order->items as $item)
                <div class="flex justify-between gap-4 text-xs sm:text-sm py-2.5 sm:py-3 border-b border-gold/10 last:border-0">
                    <span class="text-muted flex-1 min-w-0">{{ $item->product_name }} &times; {{ $item->quantity }}</span>
                    <span class="text-ink flex-shrink-0">${{ number_format($item->subtotal, 2) }}</span>
                </div>
            @endforeach
            <div class="flex justify-between font-medium text-ink text-sm sm:text-base pt-4 mt-2">
                <span>Total</span>
                <span class="font-display text-lg sm:text-xl">${{ number_format($order->total, 2) }}</span>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn-primary max-w-xs mx-auto">Return Home</a>
    </div>
</section>
@endsection
