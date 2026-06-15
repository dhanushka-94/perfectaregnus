@props(['title', 'updated' => 'June 15, 2026'])

<section class="legal-hero">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 lg:py-16">
        <nav class="breadcrumb text-muted mb-6 sm:mb-8" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-ink transition-colors">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink">{{ $title }}</span>
        </nav>
        <p class="section-label mb-2 sm:mb-3">Legal</p>
        <h1 class="font-display heading-section font-semibold text-ink mb-3 sm:mb-4">{{ $title }}</h1>
        <div class="gold-line mb-4 sm:mb-5"></div>
        <p class="text-sm text-muted">Last updated: {{ $updated }}</p>
    </div>
</section>
