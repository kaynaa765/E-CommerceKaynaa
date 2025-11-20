<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        // Paksa login sebelum checkout
        if (!Auth::check()) {
            return redirect()->route('auth.choice')->with('message', 'Silakan login terlebih dahulu untuk melanjutkan checkout');
        }

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('siswa.dashboard')->with('error', 'Keranjang kosong');
        }

        return view('checkout.index', compact('cart'));
    }

    public function create(Request $request)
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('siswa.dashboard')->with('error', 'Keranjang kosong');
        }

        $paymentMethod = $request->input('payment_method', 'cod');
        
        // Calculate totals
        $subtotal = 0;
        foreach($cart as $item) {
            $subtotal += $item['harga'] * $item['qty'];
        }

        // Gratis ongkir jika subtotal >= 30.000
        $ongkir = $subtotal >= 30000 ? 0 : 25000;
        $totalAmount = $subtotal + $ongkir + 1000 + 500; // Biaya layanan + penanganan

        // Generate order number
        $orderNumber = 'KYN' . date('YmdHis');
        $trackingNumber = 'JNE' . strtoupper(uniqid());

        // Save order to session for detail page
        session()->put('lastOrder', $cart);
        session()->put('lastOrderNumber', $orderNumber);
        session()->put('lastOrderPaymentMethod', $paymentMethod);
        session()->put('lastOrderTotal', $totalAmount);
        session()->put('lastOrderTrackingNumber', $trackingNumber);

        // Here you would normally save the order to database
        // For now, we'll just clear the cart and show success message

        session()->forget('cart');

        return view('order.success', compact('orderNumber', 'paymentMethod', 'totalAmount'));
    }

    public function detail()
    {
        $orderNumber = session('lastOrderNumber');
        $paymentMethod = session('lastOrderPaymentMethod');
        $totalAmount = session('lastOrderTotal');
        $trackingNumber = session('lastOrderTrackingNumber');
        $orderDate = session('lastOrderDate', now());

        if (!$orderNumber) {
            return redirect()->route('siswa.dashboard')->with('error', 'Pesanan tidak ditemukan');
        }

        return view('order.detail', compact('orderNumber', 'paymentMethod', 'totalAmount', 'trackingNumber', 'orderDate'));
    }
}

