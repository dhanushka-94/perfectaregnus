<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('products')
            ->whereIn('image', [
                'images/product-hero.png',
                'images/product.png',
            ])
            ->update([
                'image' => 'images/product-lifestyle.png',
                'image_secondary' => null,
            ]);
    }

    public function down(): void
    {
        DB::table('products')
            ->where('image', 'images/product-lifestyle.png')
            ->update([
                'image' => 'images/product-hero.png',
            ]);
    }
};
