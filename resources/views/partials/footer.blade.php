<footer class="bg-ink text-white mt-16 sm:mt-20 lg:mt-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 sm:gap-12">
            <div class="sm:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full border border-gold flex items-center justify-center flex-shrink-0">
                        <span class="font-display text-gold text-lg font-semibold">PR</span>
                    </div>
                    <div>
                        <span class="font-display text-xl font-semibold tracking-wide">PERFECTA</span>
                        <span class="block text-[10px] tracking-[0.3em] text-gold uppercase -mt-1">Regen</span>
                    </div>
                </div>
                <p class="text-white/60 text-sm leading-relaxed max-w-sm">
                    Premium USA-made collagen peptides designed to support healthy skin, hair, nails, and beauty from within.
                </p>
            </div>

            <div>
                <h4 class="section-label text-gold mb-4">Quick Links</h4>
                <ul class="space-y-2.5 text-sm text-white/60">
                    <li><a href="{{ route('home') }}#why-perfecta" class="hover:text-gold transition-colors inline-block py-0.5">Why Perfecta Regen</a></li>
                    <li><a href="{{ route('home') }}#formula" class="hover:text-gold transition-colors inline-block py-0.5">Our Formula</a></li>
                    <li><a href="{{ route('home') }}#how-to-use" class="hover:text-gold transition-colors inline-block py-0.5">How to Use</a></li>
                    <li><a href="{{ route('product.show', 'collagen-peptides') }}" class="hover:text-gold transition-colors inline-block py-0.5">Shop</a></li>
                </ul>
            </div>

            <div>
                <h4 class="section-label text-gold mb-4">Contact</h4>
                <p class="text-sm text-white/60 leading-relaxed">
                    743 California Ave.<br>
                    Simi Valley, CA 93065<br>
                    United States
                </p>
            </div>
        </div>

        <div class="border-t border-white/10 mt-10 sm:mt-12 pt-6 sm:pt-8 flex flex-col gap-4 sm:gap-6">
            <p class="text-xs text-white/40 text-center sm:text-left">&copy; {{ date('Y') }} Perfecta Regen. All rights reserved.</p>
            <p class="text-xs text-white/40 text-center sm:text-left leading-relaxed max-w-2xl">
                These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.
            </p>
            <p class="text-xs text-white/30 text-center sm:text-left">
                Developed by <span class="text-white/50">olexto Digital Solutions</span>
            </p>
        </div>
    </div>
</footer>
