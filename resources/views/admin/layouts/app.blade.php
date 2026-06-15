<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — Perfecta Regen</title>
    @include('partials.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body antialiased">
    <div class="admin-layout">
        @include('admin.partials.sidebar')

        <div class="admin-main">
            <header class="admin-topbar">
                <div class="flex-1 min-w-0">
                    <h1 class="font-display text-lg sm:text-xl font-semibold text-ink truncate">@yield('page_title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3 sm:gap-4 flex-shrink-0">
                    <a href="{{ route('home') }}" target="_blank" class="text-xs sm:text-sm text-muted hover:text-ink transition-colors hidden sm:inline">View Store</a>
                    <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                        <x-avatar :src="auth()->user()->profile_image_url" :name="auth()->user()->name" size="sm" />
                        <span class="text-xs sm:text-sm text-muted hidden md:inline">{{ auth()->user()->name }}</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs sm:text-sm text-muted hover:text-ink transition-colors">Logout</button>
                    </form>
                </div>
            </header>

            <div class="admin-content">
                @include('admin.partials.mobile-nav')

                @if(session('success'))
                    <div class="alert-success mb-4 sm:mb-6" role="alert">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert-error mb-4 sm:mb-6" role="alert">{{ session('error') }}</div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
