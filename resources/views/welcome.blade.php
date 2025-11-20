@extends('layouts.main')

@section('title', 'Kayna Beauty')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Belanja & Kelola Kosmetik Lebih Mudah</h1>
            <p>Temukan berbagai produk kecantikan terbaik hanya di Kayna Beauty.</p>
            <a href="#produk-section" class="cta">Mulai Belanja</a>
        </div>
    </section>

    <!-- Produk Section -->
    <section class="produk" id="produk-section">
        <h2>Semua Produk</h2>
        <div class="grid">
            @foreach ($produk as $item)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
                    </div>
                    <div class="card-body">
                        <h3>{{ $item['nama'] }}</h3>
                        <p class="kategori">Kategori: Kosmetik</p>
                        <button class="btn-detail" onclick="addToCart('{{ $item['nama'] }}', '{{ $item['gambar'] }}', {{ isset($item['harga']) ? $item['harga'] : 0 }})">Tambah Keranjang</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Info Section -->
    <section class="info">
        <div class="info-box">
            <h3>Kenapa Pilih Kayna Beauty?</h3>
            <ul>
                <li>✅ Produk Terlengkap</li>
                <li>✅ Harga Terbaik</li>
                <li>✅ Komunitas Kosmetik Aktif</li>
                <li>✅ Mudah Digunakan oleh Siswa & Admin</li>
            </ul>
        </div>
    </section>

    <script>
        function addToCart(nama, gambar, harga) {
            const formData = new FormData();
            formData.append('nama', nama);
            formData.append('gambar', gambar);
            formData.append('harga', harga);
            formData.append('qty', 1);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count LANGSUNG di header dan bottom nav tanpa delay
                    if (window.updateCartCount) {
                        window.updateCartCount(data.cart_count);
                    }
                    
                    // Show success message dengan animasi
                    if (window.showNotification) {
                        window.showNotification('✓ ' + nama + ' ditambahkan ke keranjang!');
                    }
                    
                    // Add subtle animation ke badge
                    animateCartBadge();
                } else {
                    if (window.showNotification) {
                        window.showNotification('Gagal menambahkan ke keranjang', 'error');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (window.showNotification) {
                    window.showNotification('Terjadi kesalahan', 'error');
                }
            });
        }

        function animateCartBadge() {
            const badge = document.querySelector('.cart-count');
            if (badge) {
                badge.style.animation = 'none';
                setTimeout(() => {
                    badge.style.animation = 'scaleUp 0.4s ease-out';
                }, 10);
            }
        }

        // Add animation style
        const style = document.createElement('style');
        style.textContent = `
            @keyframes scaleUp {
                0% {
                    transform: scale(0.8);
                }
                50% {
                    transform: scale(1.2);
                }
                100% {
                    transform: scale(1);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection