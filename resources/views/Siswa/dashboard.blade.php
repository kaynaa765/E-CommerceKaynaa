@extends('layouts.main')

@section('title', 'Dashboard Siswa')

@section('content')
<style>
body {
    background: #f8f5f2;
}
.siswa-app {
    max-width: 480px;
    margin: 0 auto;
    background: #f8f5f2;
    min-height: 100vh;
    padding-bottom: 80px;
}
.siswa-top {
    padding: 16px 8px 0 8px;
}
.search-wrap {
    margin-bottom: 16px;
}
.search-input {
    width: 100%;
    padding: 10px 14px;
    border-radius: 8px;
    border: 1px solid #e0d9d2;
    background: #fff;
    font-size: 15px;
}
.hero-card {
    display: flex;
    gap: 16px;
    background: linear-gradient(135deg, #f7e7e1 0%, #f8f5f2 100%);
    border-radius: 16px;
    padding: 18px 16px;
    margin-bottom: 18px;
    align-items: center;
}
.hero-image img {
    width: 90px;
    height: 120px;
    object-fit: cover;
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.hero-content h1 {
    font-size: 22px;
    color: #a97c5a;
    font-weight: bold;
    margin-bottom: 8px;
}
.hero-content p {
    font-size: 14px;
    color: #7c6a5a;
}
.icon-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 18px;
}
.icon-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 13px;
    color: #a97c5a;
}
.siswa-produk {
    padding: 0 8px;
}
.produk-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}
.produk-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
    padding: 12px 8px 16px 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 0;
}
.image-wrap img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 8px;
    background: #f8f5f2;
}
.card-body h4 {
    font-size: 14px;
    color: #a97c5a;
    font-weight: bold;
    margin-bottom: 4px;
    text-align: center;
}
.harga {
    font-size: 13px;
    color: #7c6a5a;
    margin-bottom: 4px;
    text-align: center;
}
.rating {
    font-size: 12px;
    color: #FFD700;
    margin-bottom: 4px;
    text-align: center;
}
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    max-width: 480px;
    height: 54px;
    background: #fff;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.04);
    z-index: 1000;
    padding: 0;
    margin: 0;
    border-radius: 16px 16px 0 0;
}
.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2px;
    color: #a97c5a;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    background: none;
    cursor: pointer;
    width: 100%;
    height: 100%;
    flex: 1;
}
.nav-item.active {
    color: #7c6a5a;
    font-weight: bold;
}
.badge {
    background: #a97c5a;
    color: #fff;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 11px;
    font-weight: bold;
    margin-left: 2px;
}
@media (max-width: 600px) {
    .siswa-app, .bottom-nav {
        max-width: 100vw;
        border-radius: 0;
    }
    .produk-grid {
        gap: 10px;
    }
    .produk-card {
        padding: 8px 2px 12px 2px;
    }
    .image-wrap img {
        width: 70px;
        height: 70px;
    }
}
</style>
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
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M3 6h18" stroke="#a97c5a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>Promosi</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="14" rx="2" stroke="#a97c5a" stroke-width="1.5"/></svg>
                <span>Voucher</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#a97c5a" stroke-width="1.5"/></svg>
                <span>Pesan</span>
            </div>
            <div class="icon-item">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M12 8v8" stroke="#a97c5a" stroke-width="1.5" stroke-linecap="round"/><path d="M8 12h8" stroke="#a97c5a" stroke-width="1.5" stroke-linecap="round"/></svg>
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