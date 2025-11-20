<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Tampilkan dashboard admin
    public function dashboard()
    {
        // Cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Cek apakah user adalah admin
        if (Auth::user()->email !== 'admin@kaynaabeauty.com') {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Anda bukan admin');
        }

        return view('admin.dashboard');
    }

    // Produk management (redirect ke stok)
    public function produk()
    {
        return redirect()->route('stok.index');
    }

    // Siswa management
    public function siswa()
    {
        return view('admin.siswa');
    }

    // Penjualan
    public function penjualan()
    {
        return redirect()->route('penjualan.index');
    }

    // Pesanan
    public function pesanan()
    {
        return view('admin.pesanan');
    }

    // Pengaturan
    public function pengaturan()
    {
        return view('admin.pengaturan');
    }

    // Admin management
    public function admin()
    {
        return view('admin.admin');
    }
}
