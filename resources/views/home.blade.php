@extends('layouts.app')

@section('title', 'Perfecta Regen — Beauty Starts Within')

@section('content')
{{-- Hero --}}
<section class="hero-gradient hero-pattern relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 lg:py-24 xl:py-28 relative">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20 items-center">
            <div class="order-2 lg:order-1 text-center lg:text-left">
                <p class="section-label mb-3 sm:mb-4">Premium USA-Made Collagen Peptides</p>
                <h1 class="font-display heading-hero font-semibold text-ink mb-4 sm:mb-6">
                    Beauty Starts<br><span class="text-gold-dark italic">Within</span>
                </h1>
                <div class="gold-line mb-5 sm:mb-6 mx-auto lg:mx-0"></div>
                <p class="text-muted text-base sm:text-lg leading-relaxed mb-3 sm:mb-4 max-w-lg mx-auto lg:mx-0">
                    Featuring 10,000mg Type I Collagen, Hyaluronic Acid, Vitamin C, Biotin, Zinc &amp; Selenium.
                </p>
                <p class="text-muted text-sm sm:text-base leading-relaxed mb-6 sm:mb-8 max-w-lg mx-auto lg:mx-0">
                    Designed for those who want to support healthy skin, hair, nails, and overall beauty from within.
                </p>
                @if($product)
                    <div class="flex flex-col xs:flex-row gap-3 sm:gap-4 max-w-sm mx-auto lg:mx-0 sm:max-w-none">
                        <a href="{{ route('product.show', $product->slug) }}" class="btn-primary">Shop Now</a>
                        <a href="#why-perfecta" class="btn-outline">Learn More</a>
                    </div>
                @endif
            </div>
            <div class="order-1 lg:order-2 flex justify-center px-4 sm:px-0">
                <div class="relative w-full max-w-[280px] sm:max-w-md lg:max-w-lg xl:max-w-xl">
                    @if($product)
                        <div class="card-elevated overflow-hidden rounded-sm">
                            <div class="product-image-wrap product-image-wrap--hero aspect-[3/4] sm:aspect-square">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="relative w-full h-full object-contain" width="600" height="600">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Perfecta Regen --}}
<section id="why-perfecta" class="section-padding bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14 lg:mb-16">
            <p class="section-label mb-2 sm:mb-3">Why Perfecta Regen</p>
            <h2 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">Premium Ingredients. Premium Results.</h2>
            <div class="gold-line-wide mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-5 max-w-4xl mx-auto">
            @foreach([
                '10,000mg Type I Collagen',
                'Hyaluronic Acid',
                'Vitamin C',
                'Biotin',
                'Zinc',
                'Selenium',
                'Manufactured in USA',
                'Easy-to-Mix Powder',
                'No Added Sugar',
            ] as $feature)
                <div class="feature-card flex items-center text-ink rounded-sm">
                    <span class="check-item text-sm sm:text-base">{{ $feature }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Why Collagen --}}
<section class="section-padding">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20 items-center">
            <div class="text-center lg:text-left">
                <p class="section-label mb-2 sm:mb-3">Why Collagen</p>
                <h2 class="font-display heading-section font-semibold text-ink mb-4 sm:mb-6">The Foundation of Beauty</h2>
                <div class="gold-line mb-5 sm:mb-6 mx-auto lg:mx-0"></div>
                <p class="text-muted text-sm sm:text-base leading-relaxed mb-3 sm:mb-4">
                    Collagen is the most abundant protein in the human body and plays an important role in supporting the structure of skin, hair, nails, and connective tissues.
                </p>
                <p class="text-muted text-sm sm:text-base leading-relaxed">
                    As we age, natural collagen production decreases. Supplementing with collagen peptides may help support your beauty and wellness routine.
                </p>
            </div>
            <div class="card-elevated card-interactive p-6 sm:p-8 lg:p-10">
                <h3 class="font-display text-lg sm:text-xl font-semibold text-ink mb-5 sm:mb-6 text-center lg:text-left">Supports</h3>
                <div class="grid grid-cols-2 gap-3 sm:gap-4 lg:gap-6">
                    @foreach(['Skin', 'Hair', 'Nails', 'Joints'] as $benefit)
                        <div class="text-center p-4 sm:p-5 border border-gold/10 bg-cream/50 transition-colors hover:border-gold/25 hover:bg-white">
                            <p class="font-display text-base sm:text-lg text-gold-dark">{{ $benefit }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why American-Made --}}
<section class="section-padding bg-ink text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20 items-start">
            <div class="text-center lg:text-left">
                <p class="section-label text-gold mb-2 sm:mb-3">Why American-Made</p>
                <h2 class="font-display heading-section font-semibold mb-4 sm:mb-6">Manufactured in the USA</h2>
                <div class="gold-line mb-5 sm:mb-6 mx-auto lg:mx-0"></div>
                <p class="text-white/70 text-sm sm:text-base leading-relaxed mb-4 sm:mb-6">
                    Consumers worldwide trust products manufactured in the United States because of strict standards and quality control.
                </p>
                <p class="font-display text-lg sm:text-xl text-gold italic">At Perfecta Regen, quality is never compromised.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-3 sm:gap-4">
                @foreach([
                    'Strict manufacturing standards',
                    'Quality control procedures',
                    'Regulated production facilities',
                    'Consistent ingredient sourcing',
                    'High product safety standards',
                    'Transparent labeling requirements',
                ] as $point)
                    <div class="card-dark rounded-sm p-4 sm:p-5 flex items-center text-white/85">
                        <span class="check-item text-sm sm:text-base">{{ $point }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Formula --}}
<section id="formula" class="section-padding bg-white scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14 lg:mb-16">
            <p class="section-label mb-2 sm:mb-3">Why Our Formula Stands Out</p>
            <h2 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">More Than Just Collagen</h2>
            <div class="gold-line-wide mx-auto mb-4 sm:mb-6"></div>
            <p class="text-muted text-sm sm:text-base leading-relaxed px-2 sm:px-0">
                Many collagen products contain only collagen peptides. Perfecta Regen combines a comprehensive blend to create a complete beauty and wellness formula.
            </p>
        </div>
        <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6 max-w-4xl mx-auto">
            @foreach([
                ['Type I Collagen', '10,000mg per serving'],
                ['Hyaluronic Acid', '150mg per serving'],
                ['Vitamin C', '200mg (200% DV)'],
                ['Biotin', '300mcg (1000% DV)'],
                ['Zinc', '10mg (91% DV)'],
                ['Selenium', '100mcg (182% DV)'],
            ] as [$name, $dose])
                <div class="card-elevated card-interactive formula-card p-5 sm:p-6 text-center">
                    <h3 class="font-display text-base sm:text-lg font-semibold text-ink mb-1">{{ $name }}</h3>
                    <p class="text-xs sm:text-sm text-gold-dark">{{ $dose }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- How to Use --}}
<section id="how-to-use" class="section-padding scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center mb-10 sm:mb-12 lg:mb-14">
            <p class="section-label mb-2 sm:mb-3">How to Use</p>
            <h2 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">Daily Directions</h2>
            <div class="gold-line-wide mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 max-w-4xl mx-auto">
            @foreach([
                ['01', 'Add 2 scoops to 10oz of water.'],
                ['02', 'Stir or shake thoroughly.'],
                ['03', 'Enjoy once daily.'],
            ] as [$step, $text])
                <div class="card-elevated card-interactive step-card p-6 sm:p-8 text-center">
                    <span class="font-display text-3xl sm:text-4xl text-gold/30 font-semibold">{{ $step }}</span>
                    <p class="text-muted text-sm sm:text-base mt-3 sm:mt-4 leading-relaxed">{{ $text }}</p>
                </div>
            @endforeach
        </div>
        <p class="text-center text-muted text-sm sm:text-base mt-8 sm:mt-10 max-w-lg mx-auto px-4">
            For best results, make it part of your daily wellness routine.
        </p>
    </div>
</section>

{{-- Who Is It For --}}
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20 items-center">
            <div class="order-2 lg:order-1 text-center lg:text-left">
                <p class="section-label mb-2 sm:mb-3">Who Is It For</p>
                <h2 class="font-display heading-section font-semibold text-ink mb-4 sm:mb-6">Perfect For</h2>
                <div class="gold-line mb-6 sm:mb-8 mx-auto lg:mx-0"></div>
                <ul class="space-y-3 sm:space-y-4 text-left max-w-md mx-auto lg:mx-0">
                    @foreach([
                        'Women seeking beauty support',
                        'Busy professionals',
                        'Brides preparing for their special day',
                        'Beauty-conscious individuals',
                        'Wellness enthusiasts',
                        'Anyone looking to support healthy skin, hair, and nails',
                    ] as $audience)
                        <li class="flex items-start text-muted text-sm sm:text-base">
                            <span class="w-1.5 h-1.5 rounded-full bg-gold mt-2 mr-3 sm:mr-4 flex-shrink-0"></span>
                            <span>{{ $audience }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($product)
                <div class="order-1 lg:order-2 flex justify-center">
                    <div class="card-elevated p-4 sm:p-6 lg:p-8 w-full max-w-xs sm:max-w-sm overflow-hidden">
                        <img src="{{ $product->image_secondary_url ?? $product->image_url }}" alt="{{ $product->name }} — lifestyle" class="w-full object-contain rounded-sm" width="400" height="400">
                        @if($product->image_secondary)
                            <p class="text-xs text-muted text-center mt-3 sm:mt-4">Premium packaging &amp; presentation</p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Trust --}}
<section class="section-padding bg-ink text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14 lg:mb-16">
            <p class="section-label text-gold mb-2 sm:mb-3">Trust</p>
            <h2 class="font-display heading-section font-semibold mb-3 sm:mb-4">Quality You Can Trust</h2>
            <div class="gold-line-wide mx-auto"></div>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6 max-w-4xl mx-auto">
            @foreach([
                'Manufactured in USA',
                'Premium Ingredients',
                'Carefully Formulated',
                'Quality Tested',
                'Easy to Mix',
                'Premium Packaging',
            ] as $trust)
                <div class="card-dark rounded-sm p-4 sm:p-6 text-center">
                    <p class="text-white/90 text-xs sm:text-sm lg:text-base leading-snug">{{ $trust }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
@if($product)
<section class="section-padding pb-16 sm:pb-20 lg:pb-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="cta-banner rounded-sm p-6 sm:p-10 lg:p-16 text-center max-w-3xl mx-auto relative">
            <p class="section-label mb-2 sm:mb-3 relative">Start Your Routine</p>
            <h2 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4 relative">{{ $product->name }}</h2>
            <p class="text-muted text-sm sm:text-base mb-2 relative">30 Servings &middot; 321g (11.32oz)</p>
            <p class="font-display text-2xl sm:text-3xl text-gold-dark font-semibold mb-6 sm:mb-8 relative">${{ number_format($product->price, 2) }}</p>
            <a href="{{ route('product.show', $product->slug) }}" class="btn-primary relative max-w-xs mx-auto sm:max-w-none">Shop Now</a>
        </div>
    </div>
</section>
@endif
@endsection
