<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = [
            ['id' => 1, 'nama' => 'Blush On Tabur', 'gambar' => 'blush on tabur.jpg'],
            ['id' => 2, 'nama' => 'Body Scrub', 'gambar' => 'Body Scrub.jpg'],
            ['id' => 3, 'nama' => 'Conditioner', 'gambar' => 'Conditioner.jpg'],
            ['id' => 4, 'nama' => 'Cusion', 'gambar' => 'Cusion.jpg'],
            ['id' => 5, 'nama' => 'Red Smootie Serum', 'gambar' => 'Serum3.jpg'],
            ['id' => 6, 'nama' => 'Lipe Glos', 'gambar' => 'Lipe Glos.jpg'],
            ['id' => 7, 'nama' => 'Vitamins C Serum', 'gambar' => 'Serum.jpg'],
            ['id' => 8, 'nama' => 'Parfum', 'gambar' => 'Parfum.jpg'],
            ['id' => 9, 'nama' => 'Parfum', 'gambar' => 'Parfum1.jpg'],
            ['id' => 10, 'nama' => 'Parfum', 'gambar' => 'Parfum2.jpg'],
            ['id' => 11, 'nama' => 'Parfum', 'gambar' => 'parfum 4.jpg'],
            ['id' => 12, 'nama' => 'Sampo', 'gambar' => 'Sampo.jpg'],
            ['id' => 13, 'nama' => 'Seeting Spray', 'gambar' => 'seeting spray.jpg'],
            ['id' => 14, 'nama' => 'Toner', 'gambar' => 'Toner.jpg'],
        ];

        return view('dashboard', compact('produk'));
    }
}
