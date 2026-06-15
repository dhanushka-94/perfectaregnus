<footer class="site-footer mt-16 sm:mt-20 lg:mt-24" aria-labelledby="footer-heading">
    <div class="footer-accent" aria-hidden="true"></div>

    <div class="site-footer__inner max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Main grid --}}
        <div class="site-footer__main py-12 sm:py-16 lg:py-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-10 sm:gap-12 lg:gap-10 xl:gap-14">
                {{-- Brand --}}
                <div class="sm:col-span-2 lg:col-span-5">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group mb-5 sm:mb-6">
                        <div class="w-11 h-11 rounded-full border border-gold/80 flex items-center justify-center flex-shrink-0 transition-colors group-hover:border-gold group-hover:bg-gold/5">
                            <span class="font-display text-gold text-lg font-semibold">PR</span>
                        </div>
                        <div>
                            <span id="footer-heading" class="font-display text-xl sm:text-2xl font-semibold tracking-wide text-white block">PERFECTA</span>
                            <span class="block text-[10px] tracking-[0.3em] text-gold uppercase -mt-0.5">Regen</span>
                        </div>
                    </a>
                    <p class="text-white/60 text-sm sm:text-[0.9375rem] leading-relaxed max-w-md mb-6 sm:mb-8">
                        Premium USA-made collagen peptides designed to support healthy skin, hair, nails, and beauty from within.
                    </p>
                    <div class="flex flex-col xs:flex-row gap-3 max-w-sm">
                        <a href="{{ route('product.show', 'collagen-peptides') }}" class="btn-gold text-center">Shop Now</a>
                        <a href="{{ route('cart.index') }}" class="btn-footer-outline text-center">View Cart</a>
                    </div>
                    <ul class="footer-trust-list mt-8 sm:mt-10" aria-label="Quality highlights">
                        @foreach(['Made in USA', 'GMP Certified', 'Premium Ingredients'] as $badge)
                            <li class="footer-trust-badge">{{ $badge }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Navigate --}}
                <div class="lg:col-span-2 lg:col-start-7">
                    <h4 class="footer-heading">Navigate</h4>
                    <div class="footer-heading-line" aria-hidden="true"></div>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}#why-perfecta" class="footer-link">Why Perfecta Regen</a></li>
                        <li><a href="{{ route('home') }}#formula" class="footer-link">Our Formula</a></li>
                        <li><a href="{{ route('home') }}#how-to-use" class="footer-link">How to Use</a></li>
                        <li><a href="{{ route('product.show', 'collagen-peptides') }}" class="footer-link">Shop</a></li>
                        <li><a href="{{ route('cart.index') }}" class="footer-link">Cart</a></li>
                        <li><a href="{{ route('privacy') }}" class="footer-link">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="footer-link">Terms &amp; Conditions</a></li>
                    </ul>
                </div>

                {{-- Explore --}}
                <div class="lg:col-span-2">
                    <h4 class="footer-heading">Explore</h4>
                    <div class="footer-heading-line" aria-hidden="true"></div>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}#why-collagen" class="footer-link">Why Collagen</a></li>
                        <li><a href="{{ route('home') }}#american-made" class="footer-link">American-Made</a></li>
                        <li><a href="{{ route('home') }}#who-is-it-for" class="footer-link">Who Is It For</a></li>
                        <li><a href="{{ route('home') }}#trust" class="footer-link">Quality &amp; Trust</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div class="lg:col-span-3">
                    <h4 class="footer-heading">Contact</h4>
                    <div class="footer-heading-line" aria-hidden="true"></div>
                    <address class="not-italic text-sm text-white/60 leading-relaxed space-y-4">
                        <p class="flex gap-3">
                            <svg class="footer-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>
                                743 California Ave.<br>
                                Simi Valley, CA 93065<br>
                                United States
                            </span>
                        </p>
                        <p class="flex gap-3">
                            <svg class="footer-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:hello@perfectaregen.com" class="footer-link inline">hello@perfectaregen.com</a>
                        </p>
                    </address>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="site-footer__bottom py-6 sm:py-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 lg:gap-8">
                <div class="space-y-3 sm:space-y-4 max-w-3xl">
                    <p class="text-xs sm:text-sm text-white/45 leading-relaxed">
                        &copy; {{ date('Y') }} Perfecta Regen. All rights reserved.
                    </p>
                    <nav class="footer-legal-links" aria-label="Legal">
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                        <span aria-hidden="true">·</span>
                        <a href="{{ route('terms') }}">Terms &amp; Conditions</a>
                    </nav>
                    <p class="text-[11px] sm:text-xs text-white/35 leading-relaxed">
                        These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.
                    </p>
                    <p class="text-[11px] sm:text-xs text-white/30">
                        Developed by <span class="text-white/45">olexto Digital Solutions</span>
                    </p>
                </div>
                <a href="#site-top" class="footer-back-top group shrink-0 self-center lg:self-auto">
                    <span>Back to top</span>
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
