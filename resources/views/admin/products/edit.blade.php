@extends('admin.layouts.app')

@section('title', 'Product')
@section('page_title', 'Product Management')

@section('content')
<form action="{{ route('admin.products.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid lg:grid-cols-3 gap-4 sm:gap-6">
        <div class="lg:col-span-2 space-y-4 sm:space-y-6">
            <div class="admin-card p-4 sm:p-6 space-y-4">
                <h2 class="font-display text-lg font-semibold text-ink">Product Details</h2>

                <div>
                    <label for="name" class="block text-sm font-medium text-ink mb-1.5">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="input-field @error('name') border-red-400 @enderror">
                    @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="short_description" class="block text-sm font-medium text-ink mb-1.5">Short Description</label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $product->short_description) }}" required class="input-field @error('short_description') border-red-400 @enderror">
                    @error('short_description')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-ink mb-1.5">Full Description</label>
                    <textarea name="description" id="description" rows="5" required class="input-field @error('description') border-red-400 @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="space-y-4 sm:space-y-6">
            <div class="admin-card p-4 sm:p-6 space-y-4">
                <h2 class="font-display text-lg font-semibold text-ink">Pricing & Stock</h2>

                <div>
                    <label for="price" class="block text-sm font-medium text-ink mb-1.5">Price (USD)</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required class="input-field @error('price') border-red-400 @enderror">
                    @error('price')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="stock" class="block text-sm font-medium text-ink mb-1.5">Stock Quantity</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" required class="input-field @error('stock') border-red-400 @enderror">
                    @error('stock')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} class="rounded border-gray-300">
                    Product is active on store
                </label>

                <button type="submit" class="btn-primary w-full">Save Changes</button>
            </div>

            <div class="admin-card p-4 sm:p-6 space-y-4">
                <h2 class="font-display text-lg font-semibold text-ink">Primary Image</h2>
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full object-contain rounded-sm bg-ink/5 max-h-48">
                @endif
                <div>
                    <label for="image" class="block text-sm font-medium text-ink mb-1.5">Upload primary image</label>
                    <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp,image/gif" class="input-field file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-ink file:text-white file:text-xs file:uppercase">
                    @error('image')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    <p class="text-xs text-muted mt-1">JPG, PNG, WebP or GIF. Max 5MB.</p>
                </div>
            </div>

            <div class="admin-card p-4 sm:p-6 space-y-4">
                <h2 class="font-display text-lg font-semibold text-ink">Lifestyle Image</h2>
                @if($product->image_secondary_url)
                    <img src="{{ $product->image_secondary_url }}" alt="{{ $product->name }} lifestyle" class="w-full object-contain rounded-sm bg-cream max-h-48">
                @endif
                <div>
                    <label for="image_secondary" class="block text-sm font-medium text-ink mb-1.5">Upload lifestyle image</label>
                    <input type="file" name="image_secondary" id="image_secondary" accept="image/jpeg,image/png,image/webp,image/gif" class="input-field file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-ink file:text-white file:text-xs file:uppercase">
                    @error('image_secondary')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    <p class="text-xs text-muted mt-1">Shown in the "Who Is It For" section.</p>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
