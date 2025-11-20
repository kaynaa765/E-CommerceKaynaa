@extends('Layouts.main')

@section('content')
<style>
    .product-detail-container {
        max-width: 480px;
        margin: 0 auto;
        padding: 12px;
        padding-bottom: 80px;
        background: linear-gradient(180deg, #FFB6D9 0%, #FFD4E5 30%, #FFE8F0 70%, #F5E6D3 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        gap: 12px;
        align-items: stretch;
    }

    .product-image-section {
        flex: 0 0 auto;
        padding: 10px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: auto;
        position: relative;
        top: auto;
    }

    .product-image-section img {
        width: 100%;
        height: auto;
        max-height: 300px;
        object-fit: contain;
        border-radius: 10px;
    }

    .product-info-section {
        flex: 0 0 auto;
        padding: 12px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 22px;
        font-weight: bold;
        background: linear-gradient(135deg, #8B1538, #C91F6A);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 15px;
    }

    .product-rating {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        gap: 10px;
    }

    .product-rating .stars {
        color: #FFD700;
        font-size: 14px;
    }

    .product-rating .rating-text {
        color: #666;
        font-size: 12px;
    }

    .product-rating .terjual {
        color: #999;
        font-size: 11px;
    }

    .product-description {
        color: #333;
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 12px;
        border-top: 1px solid #EEE;
        padding-top: 15px;
    }

    .product-benefits {
        background: linear-gradient(135deg, #FFF0F6 0%, #FFE8F0 100%);
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .benefits-title {
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 10px;
        font-size: 13px;
    }

    .benefits-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .benefits-list li {
        color: #555;
        font-size: 11px;
        padding: 6px 0;
        padding-left: 20px;
        position: relative;
    }

    .benefits-list li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: #C91F6A;
        font-weight: bold;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .btn-action {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 12px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 150px;
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-beli {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
    }

    .btn-beli:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .btn-keranjang {
        background: white;
        color: #C91F6A;
        border: 2px solid #C91F6A;
        box-shadow: 0 2px 8px rgba(201, 31, 106, 0.2);
    }

    .btn-keranjang:hover {
        background: #FFF0F6;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.3);
    }

    .back-button {
        position: fixed;
        top: 15px;
        left: 15px;
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        z-index: 100;
        color: #8B1538;
    }

    .back-button:hover {
        background: #FFE8F0;
    }

    @media (max-width: 768px) {
        .product-detail-container {
            flex-direction: column;
            padding: 15px;
            padding-bottom: 100px;
        }

        .product-image-section {
            flex: 0 0 auto;
            position: static;
        }

        .product-name {
            font-size: 20px;
        }

        .product-price {
            font-size: 24px;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }

</style>

<button class="back-button" onclick="window.history.back();">←</button>

<div class="product-detail-container">
    <div class="product-image-section">
        <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" loading="lazy">
    </div>

    <div class="product-info-section">
        <div class="product-name">{{ $item['nama'] }}</div>
        
        <div class="product-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>

        <div class="product-rating">
            <div class="stars">★★★★★</div>
            <div class="rating-text">{{ number_format($item['rating'], 1) }}/5.0</div>
            <div class="terjual">({{ number_format($item['terjual']) }} terjual)</div>
        </div>

        <div class="product-description">
            {{ $item['deskripsi'] }}
        </div>

        <div class="product-benefits">
            <div class="benefits-title">Manfaat Produk</div>
            <ul class="benefits-list">
                <li>Formula alami dan aman untuk semua jenis kulit</li>
                <li>Tahan lama dan hasil yang maksimal</li>
                <li>Dipercaya oleh ribuan pelanggan setia</li>
                <li>Dermatologically tested dan approved</li>
                <li>Packaging ramah lingkungan</li>
            </ul>
        </div>

        <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
            @csrf
            <input type="hidden" name="nama" value="{{ $item['nama'] }}">
            <input type="hidden" name="gambar" value="{{ $item['gambar'] }}">
            <input type="hidden" name="harga" value="{{ $item['harga'] }}">
            <input type="hidden" name="qty" value="1" id="qtyInput">

            <div class="action-buttons">
                <button type="button" class="btn-action btn-beli" onclick="belisekarangClick();">
                    💳 Beli Sekarang
                </button>
                <button type="button" class="btn-action btn-keranjang" onclick="masukkanKeranjang();">
                    🛒 Masukkan Keranjang
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function updateCartBadge(count) {
        // Update global cart count
        if (window.cartCount !== undefined) {
            window.cartCount = count;
        } else {
            window.cartCount = count;
        }
        
        // Find and update all cart links
        const cartLinks = document.querySelectorAll('a[href*="cart.index"]');
        cartLinks.forEach(link => {
            link.textContent = `Keranjang (${count})`;
        });

        // Dispatch custom event for other pages
        window.dispatchEvent(new CustomEvent('cartUpdated', {
            detail: { count: count }
        }));
    }

    function getCSRFToken() {
        let token = document.querySelector('input[name="_token"]')?.value;
        if (!token) {
            token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        }
        return token;
    }

    function masukkanKeranjang() {
        const csrfToken = getCSRFToken();
        
        if (!csrfToken) {
            alert('Token CSRF tidak ditemukan. Silakan refresh halaman.');
            return;
        }

        const formData = new FormData();
        formData.append('nama', '{{ $item['nama'] }}');
        formData.append('gambar', '{{ $item['gambar'] }}');
        formData.append('harga', '{{ $item['harga'] }}');
        formData.append('qty', 1);
        formData.append('_token', csrfToken);
        
        // Optimistic update - update UI immediately
        const currentCount = window.cartCount || {{ count(session('cart', [])) }};
        const newCount = currentCount + 1;
        updateCartBadge(newCount);
        
        console.log('Masukkan Keranjang clicked - Current:', currentCount, 'New:', newCount);
        
        fetch('{{ route('cart.add') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            
            // Update with actual count from server
            if (data.success && data.cart_count !== undefined) {
                updateCartBadge(data.cart_count);
            }
            
            // Show notification
            const notification = document.createElement('div');
            notification.style.cssText = 'position:fixed;top:20px;right:20px;background:#4CAF50;color:white;padding:15px 20px;border-radius:8px;z-index:1000;animation:slideIn 0.3s ease-in-out;font-weight:bold;box-shadow:0 4px 12px rgba(0,0,0,0.2);';
            notification.textContent = `✓ {{ $item['nama'] }} berhasil ditambahkan!`;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-in-out';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        })
        .catch(error => {
            console.error('Error:', error);
            // Revert on error
            updateCartBadge(currentCount);
            alert('Error: ' + error.message);
        });
    }

    function belisekarangClick() {
        const csrfToken = getCSRFToken();
        
        if (!csrfToken) {
            alert('Token CSRF tidak ditemukan. Silakan refresh halaman.');
            return;
        }

        const formData = new FormData();
        formData.append('nama', '{{ $item['nama'] }}');
        formData.append('gambar', '{{ $item['gambar'] }}');
        formData.append('harga', '{{ $item['harga'] }}');
        formData.append('qty', 1);
        formData.append('_token', csrfToken);
        
        console.log('Beli Sekarang clicked');
        
        fetch('{{ route('cart.add') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Beli Sekarang Response:', data);
            if (data.success) {
                if (data.cart_count !== undefined) {
                    updateCartBadge(data.cart_count);
                }
                window.location.href = '{{ route('checkout.index') }}';
            } else {
                alert('Gagal menambahkan produk');
            }
        })
        .catch(error => {
            console.error('Beli Sekarang Error:', error);
            alert('Gagal menambahkan produk');
        });
    }
</script>

<style>
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
</style>

@endsection
