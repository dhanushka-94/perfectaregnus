@props(['src' => null, 'name' => '', 'size' => 'md'])

@php
    $sizes = [
        'sm' => 'w-8 h-8 text-xs',
        'md' => 'w-10 h-10 text-sm',
        'lg' => 'w-16 h-16 text-base',
        'xl' => 'w-24 h-24 text-xl',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

@if($src)
    <img src="{{ $src }}" alt="{{ $name }}" {{ $attributes->merge(['class' => "$sizeClass rounded-full object-cover flex-shrink-0 border border-gold/20"]) }}>
@else
    <div {{ $attributes->merge(['class' => "$sizeClass rounded-full flex items-center justify-center flex-shrink-0 bg-ink text-gold font-medium border border-gold/30"]) }}>
        {{ avatar_initials($name) }}
    </div>
@endif
