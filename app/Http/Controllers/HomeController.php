<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::where('is_active', true)->first();

        return view('home', compact('product'));
    }
}
