<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::updateOrCreate(
            ['slug' => 'collagen-peptides'],
            [
                'name' => 'Perfecta Regen Collagen Peptides',
                'short_description' => 'Premium USA-Made Collagen Peptides with 10,000mg Type I Collagen, Hyaluronic Acid, Vitamin C, Biotin, Zinc & Selenium.',
                'description' => 'Designed for those who want to support healthy skin, hair, nails, and overall beauty from within. Our comprehensive formula combines Type I Collagen with Hyaluronic Acid, Vitamin C, Biotin, Zinc, and Selenium for a complete beauty and wellness routine.',
                'price' => 59.99,
                'image' => 'images/product-hero.png',
                'image_secondary' => 'images/product-lifestyle.png',
                'stock' => 500,
                'features' => [
                    '10,000mg Type I Collagen',
                    '150mg Hyaluronic Acid',
                    '200mg Vitamin C',
                    '300mcg Biotin',
                    '10mg Zinc',
                    '100mcg Selenium',
                    '30 Servings (321g)',
                    'Manufactured in USA',
                    'No Added Sugar',
                    'Easy-to-Mix Powder',
                ],
                'is_active' => true,
            ]
        );
    }
}
