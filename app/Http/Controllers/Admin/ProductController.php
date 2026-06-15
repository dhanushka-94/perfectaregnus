<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit()
    {
        $product = Product::where('is_active', true)->firstOrFail();

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, ImageUploadService $uploader)
    {
        $product = Product::where('is_active', true)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $data = [
            'name' => $validated['name'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            if ($product->image_secondary) {
                $uploader->delete($product->image_secondary);
            }
            $data['image'] = $uploader->upload($request->file('image'), 'products', $product->image);
            $data['image_secondary'] = null;
        }

        $product->update($data);

        return redirect()->route('admin.products.edit')->with('success', 'Product updated successfully.');
    }
}
