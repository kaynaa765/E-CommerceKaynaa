@extends('layouts.main')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="siswa-app">
    <div class="siswa-top">
        <div class="search-wrap">
            <input type="search" placeholder="Cari Produk Favorit" class="search-input">
        </div>

        <div class="hero-card">
            <div class="hero-image">
                <img src="{{ asset('images/Kosmetik.jpg') }}" alt="Night Peri">
            </div>
            <div class="hero-content">
                <h1>Night Peri</h1>
                <p>All Take Mood Like | Pure Blushed Check Ink | Mood Glowy Blam</p>
            </div>
        </div>

        <div class="icon-row">
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 6h18" stroke="#8B1538" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>Promosi</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="14" rx="2" stroke="#8B1538" stroke-width="1.5"/></svg>
                <span>Voucher</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#8B1538" stroke-width="1.5"/></svg>
                <span>Pesan</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 8v8" stroke="#8B1538" stroke-width="1.5" stroke-linecap="round"/><path d="M8 12h8" stroke="#8B1538" stroke-width="1.5" stroke-linecap="round"/></svg>
                <span>Riwayat</span>
            </div>
        </div>
    </div>

    <section id="produk" class="siswa-produk">
        <div class="produk-grid">
            @foreach ($produk as $item)
                <a href="{{ route('product.show', $item['id']) }}">
                    <div class="produk-card">
                        <div class="image-wrap">
                            <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
                        </div>
                        <div class="card-body">
                            <h4>{{ $item['nama'] }}</h4>
                            @if(isset($item['harga']))
                                <p class="harga">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                            @endif
                            <div class="rating">⭐ {{ $item['rating'] ?? '4.8' }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <nav class="bottom-nav">
        <a href="{{ route('siswa.dashboard') }}" class="nav-item">🏠 Home</a>
        <a href="{{ route('cart.index') }}" class="nav-item cart-item">
            🛒 Keranjang
            @php $cartCount = count(session('cart', [])); @endphp
            @if($cartCount > 0)
                <span class="badge">{{ $cartCount }}</span>
            @endif
        </a>
        <a href="{{ route('profile.show') }}" class="nav-item">👤 Profil</a>
    </nav>
</div>
@endsection