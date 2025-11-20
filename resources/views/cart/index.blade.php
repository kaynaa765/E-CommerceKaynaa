@extends('layouts.main')

@section('title', 'Keranjang Saya')

@section('content')
<div class="cart-page" style="max-width:920px;margin:1.5rem auto;padding:0 1rem;">
    <button class="back-button" onclick="window.history.back();" style="position:fixed;top:15px;left:15px;background:white;border:none;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:20px;box-shadow:0 2px 8px rgba(0,0,0,0.15);z-index:100;color:#8B1538;">←</button>
    
    <h2>Keranjang Saya</h2>

    @if(session('success'))
        <div style="background:#d4edda;padding:0.8rem;border-radius:8px;margin:0.8rem 0;color:#155724;">{{ session('success') }}</div>
    @endif

    @php $cart = session('cart', []); @endphp

    @if(empty($cart))
        <p>Keranjang kosong.</p>
    @else
        <table style="width:100%;border-collapse:collapse;margin-top:0.8rem;">
            <thead>
                <tr style="text-align:left;color:#6b2136;">
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $item)
                    <tr>
                        <td style="padding:0.6rem 0;">
                            <div style="display:flex;gap:0.8rem;align-items:center;">
                                <img src="{{ asset('images/' . ($item['gambar'] ?? 'placeholder.png')) }}" alt="{{ $item['nama'] }}" style="width:130px;height:100px;object-fit:cover;border-radius:6px;">
                                <div>
                                    <div style="font-weight:700;color:#6b2136;">{{ $item['nama'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td>Rp {{ number_format($item['harga'] ?? 0,0,',','.') }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.update') }}" style="display:flex;gap:6px;align-items:center;">
                                @csrf
                                <input type="hidden" name="key" value="{{ $key }}">
                                <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" style="width:64px;padding:6px;border:1px solid #eee;border-radius:6px;">
                                <button type="submit" class="btn-detail" style="padding:6px 10px;">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format(($item['harga'] ?? 0) * $item['qty'],0,',','.') }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="key" value="{{ $key }}">
                                <button type="submit" style="background:#fff;border:1px solid #e74c3c;color:#e74c3c;padding:6px 8px;border-radius:6px;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:1rem;">
            <form method="POST" action="{{ route('cart.clear') }}">
                @csrf
                <button type="submit" style="background:#fff;border:1px solid #e74c3c;color:#e74c3c;padding:8px 12px;border-radius:8px;">Kosongkan Keranjang</button>
            </form>

            <div style="text-align:right;">
                <div style="font-weight:700;color:#6b2136;">Total: Rp {{ number_format($total,0,',','.') }}</div>
                <a href="{{ route('checkout.index') }}" style="display:inline-block;margin-top:8px;background:linear-gradient(135deg,#C91F6A 0%,#FF7FA0 100%);color:#fff;padding:8px 14px;border-radius:8px;text-decoration:none;">Checkout</a>
            </div>
        </div>
    @endif
</div>
@endsection
