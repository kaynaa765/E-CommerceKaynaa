<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    // Tampilkan daftar pembelian admin
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

        $orders = Order::with('user')->latest()->get();
        return view('admin.pembelian', compact('orders'));
    }

    // Tampilkan detail pembelian
    public function show($id)
    {
        // Cek apakah user login dan adalah admin
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (Auth::user()->email !== 'admin@kaynaabeauty.com') {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Anda bukan admin');
        }

        $order = Order::with('user')->findOrFail($id);
        return view('admin.pembelian-detail', compact('order'));
    }
}
