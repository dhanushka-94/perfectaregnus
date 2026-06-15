<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Perfecta Regen</title>
    @include('partials.favicon')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="antialiased">
    <div class="admin-login-wrap">
        <div class="admin-login-card">
            <div class="text-center mb-8">
                <div class="w-12 h-12 rounded-full border border-gold flex items-center justify-center mx-auto mb-4">
                    <span class="font-display text-gold text-lg font-semibold">PR</span>
                </div>
                <h1 class="font-display text-2xl font-semibold text-ink">Admin Login</h1>
                <p class="text-sm text-muted mt-2">Perfecta Regen Management</p>
            </div>

            @if($errors->any())
                <div class="alert-error mb-6">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus class="input-field">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-ink mb-1.5">Password</label>
                    <input type="password" name="password" id="password" required class="input-field">
                </div>
                <label class="flex items-center gap-2 text-sm text-muted">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Remember me
                </label>
                <button type="submit" class="btn-primary w-full mt-2">Sign In</button>
            </form>

            <p class="text-xs text-muted text-center mt-6">
                <a href="{{ route('home') }}" class="hover:text-ink transition-colors">&larr; Back to store</a>
            </p>
        </div>
    </div>
</body>
</html>
