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
                'name' => 'Perfecta Regen Type I & III Collagen Peptides',
                'short_description' => 'Premium USA-Made Type I & III Collagen Peptides with 10,000mg chicken collagen, Hyaluronic Acid, Vitamin C, Biotin, Zinc & Selenium. 30 servings · 321g (11.32oz).',
                'description' => 'Designed for those who want to support healthy skin, hair, nails, and overall beauty from within. Our comprehensive formula combines chicken collagen peptides (Types I & III) with Hyaluronic Acid, Vitamin C, Biotin, Zinc, and Selenium for a complete beauty and wellness routine. Blend 2 scoops with 10 oz (approximately 300 mL) of water daily. Contains chicken (poultry). Manufactured for Perfecta Regen, Simi Valley, CA — Made in USA.',
                'price' => 70,
                'image' => 'images/product-bottle.jpg',
                'image_secondary' => 'images/product-label.jpg',
                'stock' => 500,
                'features' => [
                    '10,000mg Type I & III Collagen',
                    '150mg Hyaluronic Acid',
                    '200mg Vitamin C (222% DV)',
                    '300mcg Biotin (1000% DV)',
                    '10mg Zinc (91% DV)',
                    '100mcg Selenium (182% DV)',
                    '30 Servings · 321g (11.32oz)',
                    'Manufactured in USA',
                    'No Other Ingredients',
                    'Easy-to-Mix Powder',
                ],
                'is_active' => true,
            ]
        );
    }
}
