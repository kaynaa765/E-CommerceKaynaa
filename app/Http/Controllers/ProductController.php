<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $produk = [
            ['id' => 1, 'nama' => 'Blush On Powder', 'gambar' => 'blush on tabur.jpg', 'harga' => 45000, 'deskripsi' => 'Blush on powder dengan formula yang lembut dan tahan lama. Memberikan warna alami di pipi Anda.', 'rating' => 4.8, 'terjual' => 890],
            ['id' => 2, 'nama' => 'Chusion', 'gambar' => 'cusion.jpg', 'harga' => 65000, 'deskripsi' => 'Cushion makeup dengan coverage yang sempurna dan tahan hingga 12 jam. Cocok untuk semua jenis kulit.', 'rating' => 4.9, 'terjual' => 726],
            ['id' => 3, 'nama' => 'Parfum', 'gambar' => 'parfum3.jpg', 'harga' => 55000, 'deskripsi' => 'Parfum dengan aroma yang tahan lama dan menenangkan. Cocok digunakan setiap hari.', 'rating' => 4.8, 'terjual' => 523],
            ['id' => 4, 'nama' => 'Sabun Aftermyskin', 'gambar' => 'Sabun Aftermyskin.jpg', 'harga' => 45000, 'deskripsi' => 'Sabun pembersih yang lembut dan aman untuk semua jenis kulit sensitif.', 'rating' => 4.7, 'terjual' => 456],
            ['id' => 5, 'nama' => 'Conditioner', 'gambar' => 'Conditioner.jpg', 'harga' => 70000, 'deskripsi' => 'Conditioner rambut dengan formula nutrisi tinggi untuk rambut yang lembut dan berkilau.', 'rating' => 4.8, 'terjual' => 612],
            ['id' => 6, 'nama' => 'Serum', 'gambar' => 'Serum3.jpg', 'harga' => 50000, 'deskripsi' => 'Serum vitamin C untuk mencerahkan dan meremajakan kulit wajah secara alami.', 'rating' => 4.8, 'terjual' => 834],
            ['id' => 7, 'nama' => 'Toner', 'gambar' => 'Toner.jpg', 'harga' => 75000, 'deskripsi' => 'Toner dengan bahan alami untuk menyeimbangkan pH kulit dan mencegah jerawat.', 'rating' => 4.7, 'terjual' => 390],
            ['id' => 8, 'nama' => 'Lipe Glos', 'gambar' => 'Lipe Glos.jpg', 'harga' => 60000, 'deskripsi' => 'Lip gloss dengan warna cerah dan kilau yang tahan lama sepanjang hari.', 'rating' => 4.8, 'terjual' => 567],
            ['id' => 9, 'nama' => 'Body Scrub', 'gambar' => 'Body Scrub.jpg', 'harga' => 80000, 'deskripsi' => 'Body scrub alami untuk mengangkat sel kulit mati dan membuat kulit lebih halus.', 'rating' => 4.9, 'terjual' => 723],
        ];

        return view('Siswa.dashboard', compact('produk'));
    }

    public function show($id)
    {
        $produk = [
            ['id' => 1, 'nama' => 'Blush On Powder', 'gambar' => 'blush on tabur.jpg', 'harga' => 45000, 'deskripsi' => 'Blush on powder dengan formula yang lembut dan tahan lama. Memberikan warna alami di pipi Anda.', 'rating' => 4.8, 'terjual' => 890],
            ['id' => 2, 'nama' => 'Chusion', 'gambar' => 'cusion.jpg', 'harga' => 65000, 'deskripsi' => 'Cushion makeup dengan coverage yang sempurna dan tahan hingga 12 jam. Cocok untuk semua jenis kulit.', 'rating' => 4.9, 'terjual' => 726],
            ['id' => 3, 'nama' => 'Parfum', 'gambar' => 'parfum3.jpg', 'harga' => 55000, 'deskripsi' => 'Parfum dengan aroma yang tahan lama dan menenangkan. Cocok digunakan setiap hari.', 'rating' => 4.8, 'terjual' => 523],
            ['id' => 4, 'nama' => 'Sabun Aftermyskin', 'gambar' => 'Sabun Aftermyskin.jpg', 'harga' => 45000, 'deskripsi' => 'Sabun pembersih yang lembut dan aman untuk semua jenis kulit sensitif.', 'rating' => 4.7, 'terjual' => 456],
            ['id' => 5, 'nama' => 'Conditioner', 'gambar' => 'Conditioner.jpg', 'harga' => 70000, 'deskripsi' => 'Conditioner rambut dengan formula nutrisi tinggi untuk rambut yang lembut dan berkilau.', 'rating' => 4.8, 'terjual' => 612],
            ['id' => 6, 'nama' => 'Serum', 'gambar' => 'Serum3.jpg', 'harga' => 50000, 'deskripsi' => 'Serum vitamin C untuk mencerahkan dan meremajakan kulit wajah secara alami.', 'rating' => 4.8, 'terjual' => 834],
            ['id' => 7, 'nama' => 'Toner', 'gambar' => 'Toner.jpg', 'harga' => 75000, 'deskripsi' => 'Toner dengan bahan alami untuk menyeimbangkan pH kulit dan mencegah jerawat.', 'rating' => 4.7, 'terjual' => 390],
            ['id' => 8, 'nama' => 'Lipe Glos', 'gambar' => 'Lipe Glos.jpg', 'harga' => 60000, 'deskripsi' => 'Lip gloss dengan warna cerah dan kilau yang tahan lama sepanjang hari.', 'rating' => 4.8, 'terjual' => 567],
            ['id' => 9, 'nama' => 'Body Scrub', 'gambar' => 'Body Scrub.jpg', 'harga' => 80000, 'deskripsi' => 'Body scrub alami untuk mengangkat sel kulit mati dan membuat kulit lebih halus.', 'rating' => 4.9, 'terjual' => 723],
        ];

        $item = collect($produk)->firstWhere('id', $id);

        if (!$item) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('product.detail', compact('item'));
    }
}
