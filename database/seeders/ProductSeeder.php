<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'nama' => 'Lipstick Matte Rose Pink',
            'kategori' => 'Makeup',
            'harga' => 85000,
            'stok' => 50,
            'terjual' => 156,
            'rating' => 4.8,
            'status' => 'aktif',
        ]);

        \App\Models\Product::create([
            'nama' => 'Foundation Liquid Natural Beige',
            'kategori' => 'Makeup',
            'harga' => 125000,
            'stok' => 30,
            'terjual' => 203,
            'rating' => 4.7,
            'status' => 'aktif',
        ]);

        \App\Models\Product::create([
            'nama' => 'Mascara Volume Black',
            'kategori' => 'Makeup',
            'harga' => 65000,
            'stok' => 75,
            'terjual' => 289,
            'rating' => 4.9,
            'status' => 'aktif',
        ]);

        \App\Models\Product::create([
            'nama' => 'Blush On Coral Glow',
            'kategori' => 'Makeup',
            'harga' => 55000,
            'stok' => 40,
            'terjual' => 124,
            'rating' => 4.6,
            'status' => 'aktif',
        ]);

        \App\Models\Product::create([
            'nama' => 'Eyeshadow Palette Nude',
            'kategori' => 'Makeup',
            'harga' => 95000,
            'stok' => 25,
            'terjual' => 178,
            'rating' => 4.7,
            'status' => 'aktif',
        ]);

        \App\Models\Product::create([
            'nama' => 'Facial Cleanser Gentle',
            'kategori' => 'Skincare',
            'harga' => 75000,
            'stok' => 60,
            'terjual' => 312,
            'rating' => 4.8,
            'status' => 'aktif',
        ]);
    }
}
