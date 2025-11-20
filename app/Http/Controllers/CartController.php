<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show cart
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += ($item['harga'] ?? 0) * $item['qty'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'gambar' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'qty' => 'nullable|integer|min:1',
        ]);

        $cart = Session::get('cart', []);
        $key = md5($validated['nama']);

        if (isset($cart[$key])) {
            $cart[$key]['qty'] += $validated['qty'] ?? 1;
        } else {
            $cart[$key] = [
                'nama' => $validated['nama'],
                'gambar' => $validated['gambar'] ?? null,
                'harga' => isset($validated['harga']) ? (float) $validated['harga'] : 0,
                'qty' => $validated['qty'] ?? 1,
            ];
        }

        Session::put('cart', $cart);

        // Return JSON if AJAX request
        if ($request->header('X-Requested-With') === 'XMLHttpRequest' || $request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Produk ditambahkan ke keranjang.', 'cart_count' => count($cart)]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    // Update item quantity
    public function update(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Session::get('cart', []);
        if (isset($cart[$validated['key']])) {
            $cart[$validated['key']]['qty'] = $validated['qty'];
            Session::put('cart', $cart);
        }

        // Return JSON if AJAX request
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang diperbarui.');
    }

    // Remove item
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        if (isset($cart[$validated['key']])) {
            unset($cart[$validated['key']]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    // Clear cart
    public function clear()
    {
        Session::forget('cart');

        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan.');
    }
}
