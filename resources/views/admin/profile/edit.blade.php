@extends('admin.layouts.app')

@section('title', 'My Profile')
@section('page_title', 'My Profile')

@section('content')
<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid lg:grid-cols-3 gap-4 sm:gap-6 max-w-4xl">
        <div class="admin-card p-4 sm:p-6 text-center">
            <x-avatar :src="$user->profile_image_url" :name="$user->name" size="xl" class="mx-auto mb-4" />
            <h2 class="font-display text-lg font-semibold text-ink">{{ $user->name }}</h2>
            <p class="text-sm text-muted">{{ $user->email }}</p>

            <div class="mt-6 text-left">
                <label for="profile_image" class="block text-sm font-medium text-ink mb-1.5">Profile Photo</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/jpeg,image/png,image/webp,image/gif" class="input-field file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-ink file:text-white file:text-xs file:uppercase">
                @error('profile_image')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                <p class="text-xs text-muted mt-1">JPG, PNG, WebP or GIF. Max 5MB.</p>
            </div>
        </div>

        <div class="lg:col-span-2 admin-card p-4 sm:p-6 space-y-4">
            <h2 class="font-display text-lg font-semibold text-ink">Account Details</h2>

            <div>
                <label for="name" class="block text-sm font-medium text-ink mb-1.5">Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="input-field @error('name') border-red-400 @enderror">
                @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="input-field @error('email') border-red-400 @enderror">
                @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <hr class="border-gold/10 my-2">

            <h3 class="font-medium text-ink text-sm">Change Password <span class="text-muted font-normal">(optional)</span></h3>

            <div>
                <label for="current_password" class="block text-sm font-medium text-ink mb-1.5">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="input-field @error('current_password') border-red-400 @enderror">
                @error('current_password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-ink mb-1.5">New Password</label>
                <input type="password" name="password" id="password" class="input-field @error('password') border-red-400 @enderror">
                @error('password')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-ink mb-1.5">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input-field">
            </div>

            <button type="submit" class="btn-primary w-full sm:w-auto">Save Profile</button>
        </div>
    </div>
</form>
@endsection
