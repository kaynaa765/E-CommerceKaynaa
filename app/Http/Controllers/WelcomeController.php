<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $produk = [
            ['nama' => 'Blush On Tabur', 'gambar' => 'blush on tabur.jpg'],
            ['nama' => 'Body Scrub', 'gambar' => 'body scrub.jpg'],
            ['nama' => 'Conditioner', 'gambar' => 'conditioner.jpg'],
            ['nama' => 'Chusion', 'gambar' => 'cusion.jpg'],
            ['nama' => 'Red Smootie Serum', 'gambar' => 'Serum3.jpg'],
            ['nama' => 'Lipe Glos', 'gambar' => 'lipe glos.jpg'],
            ['nama' => 'Vitamins C Serum', 'gambar' => 'serum.jpg'],
            ['nama' => 'Parfum', 'gambar' => 'parfum1.jpg'],
            ['nama' => 'Parfum', 'gambar' => 'parfum2.jpg'],
            ['nama' => 'Parfum', 'gambar' => 'parfum3.jpg'],
            ['nama' => 'Parfum', 'gambar' => 'parfum 4.jpg'],
            ['nama' => 'Sampo', 'gambar' => 'sampo.jpg'],
            ['nama' => 'Seeting Spray', 'gambar' => 'seeting spray.jpg'],
            ['nama' => 'Toner', 'gambar' => 'toner.jpg'],
        ];

        return view('welcome', compact('produk'));
    }
}