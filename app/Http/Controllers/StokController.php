<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokController extends Controller
{
    // Tampilkan daftar stok
    public function index()
    {
        // Cek apakah user login dan adalah admin
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (Auth::user()->email !== 'admin@kaynaabeauty.com') {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Anda bukan admin');
        }

        $products = Product::all();
        return view('admin.stok', compact('products'));
    }

    // Tampilkan form tambah produk
    public function create()
    {
        return view('admin.stok_create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'rating' => 'nullable|numeric|between:0,5',
        ]);

        Product::create($validated);

        return redirect()->route('stok.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Tampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.stok_edit', compact('product'));
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'rating' => 'nullable|numeric|between:0,5',
        ]);

        $product->update($validated);

        return redirect()->route('stok.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('stok.index')->with('success', 'Produk berhasil dihapus');
    }
}
