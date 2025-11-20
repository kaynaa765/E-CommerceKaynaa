<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    // Tampilkan laporan penjualan
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

        // Ambil data penjualan
        $totalPenjualan = Order::sum('total');
        $jumlahTransaksi = Order::count();
        $totalPendapatan = Order::where('status', 'selesai')->sum('total');
        $pesananDiproses = Order::whereIn('status', ['pending', 'diproses', 'dikirim'])->count();

        $orders = Order::with('user')->latest()->get();

        return view('admin.penjualan', compact('totalPenjualan', 'jumlahTransaksi', 'totalPendapatan', 'pesananDiproses', 'orders'));
    }
}
