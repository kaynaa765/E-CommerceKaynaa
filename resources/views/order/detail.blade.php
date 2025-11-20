@extends('Layouts.main')

@section('content')
<button class="back-button" onclick="window.history.back();" style="position:fixed;top:15px;left:15px;background:white;border:none;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:20px;box-shadow:0 2px 8px rgba(0,0,0,0.15);z-index:100;color:#8B1538;">←</button>

<style>
    .order-detail-container {
        max-width: 600px;
        margin: 0 auto;
        padding-bottom: 100px;
        background: linear-gradient(180deg, #FFFBF5 0%, #FFE8F0 25%, #FFD4E5 50%, #FFB6D9 100%);
        min-height: 100vh;
    }

    .order-header {
        background: white;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .header-status {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .status-icon {
        width: 28px;
        height: 28px;
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
    }

    .status-text {
        display: flex;
        flex-direction: column;
    }

    .status-label {
        font-size: 12px;
        color: #999;
    }

    .status-value {
        font-size: 14px;
        font-weight: bold;
        color: #8B1538;
    }

    .header-address {
        display: flex;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid #EEE;
        font-size: 13px;
        color: #555;
    }

    .header-address svg {
        min-width: 16px;
        color: #C91F6A;
    }

    .status-timeline {
        display: flex;
        justify-content: space-around;
        padding: 15px 0;
        margin-top: 15px;
        border-top: 1px solid #EEE;
        font-size: 12px;
    }

    .timeline-item {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .timeline-dot {
        width: 24px;
        height: 24px;
        background: #FFE8F0;
        border: 2px solid #C91F6A;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .timeline-dot.active {
        background: #C91F6A;
        color: white;
    }

    .timeline-label {
        color: #666;
        font-weight: 500;
    }

    .product-section {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        margin: 0 15px 15px 15px;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .store-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .store-icon {
        width: 36px;
        height: 36px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #C91F6A;
        font-size: 20px;
    }

    .store-name {
        font-weight: bold;
        font-size: 15px;
    }

    .product-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .product-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .product-image {
        width: 130px;
        height: 130px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-weight: bold;
        margin-bottom: 6px;
        font-size: 14px;
    }

    .product-qty-price {
        font-size: 13px;
        opacity: 0.95;
        display: flex;
        justify-content: space-between;
    }

    .info-section {
        background: white;
        margin: 0 15px 15px 15px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .section-title {
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 12px;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title svg {
        width: 20px;
        height: 20px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #F0F0F0;
        font-size: 14px;
        color: #555;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        color: #666;
    }

    .info-value {
        font-weight: 500;
        color: #333;
    }

    .summary-section {
        background: white;
        margin: 0 15px 15px 15px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #F0F0F0;
        font-size: 13px;
        color: #555;
    }

    .summary-row:last-child {
        border-bottom: none;
    }

    .summary-row.total {
        border-top: 2px solid #FFB6D9;
        padding-top: 12px;
        margin-top: 12px;
        font-weight: bold;
        font-size: 16px;
        color: #8B1538;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        margin: 0 15px 20px 15px;
        flex-wrap: wrap;
    }

    .btn-action {
        flex: 1;
        padding: 14px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 140px;
        text-align: center;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #C91F6A;
        border: 2px solid #C91F6A;
        box-shadow: 0 2px 8px rgba(201, 31, 106, 0.2);
    }

    .btn-secondary:hover {
        background: #FFF0F6;
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

    @media (max-width: 480px) {
        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            min-width: auto;
        }

        .status-timeline {
            gap: 8px;
        }

        .timeline-label {
            font-size: 11px;
        }
    }
</style>

<button class="back-button" onclick="window.history.back();">←</button>

<div class="order-detail-container">
    <!-- Order Header -->
    <div class="order-header">
        <div class="header-status">
            <div class="status-icon">📦</div>
            <div class="status-text">
                <span class="status-label">Pesanan Dibuat</span>
                <span class="status-value">{{ date('d M Y', strtotime($orderDate ?? now())) }}</span>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="status-timeline">
            <div class="timeline-item">
                <div class="timeline-dot active">✓</div>
                <div class="timeline-label">Dibuat</div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot">📦</div>
                <div class="timeline-label">Dikirim</div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot">✓</div>
                <div class="timeline-label">Tiba</div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot">⭐</div>
                <div class="timeline-label">Rating</div>
            </div>
        </div>

        <!-- Address -->
        <div class="header-address">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 2C7.58 2 4 5.58 4 10c0 7 8 13 8 13s8-6 8-13c0-4.42-3.58-8-8-8z" fill="currentColor"/></svg>
            <div>
                <strong>Kayna (+62)83**********15</strong><br>
                Blok Kemundingan Rt 01 Bb 05 Mateong, Kaliksumo, Kendal, Jawa Tengah, Indonesia
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="product-section">
        <div class="store-header">
            <div class="store-icon">🏪</div>
            <div class="store-name">Kayna Beauty</div>
        </div>

        @forelse(session('lastOrder', []) as $item)
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
                </div>
                <div class="product-info">
                    <div class="product-name">{{ $item['nama'] }}</div>
                    <div class="product-qty-price">
                        <span>{{ $item['qty'] }} x</span>
                        <span>Rp{{ number_format($item['harga'], 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="product-item">
                <p style="color: rgba(255,255,255,0.8);">Tidak ada produk</p>
            </div>
        @endforelse
    </div>

    <!-- Pengiriman Section -->
    <div class="info-section">
        <div class="section-title">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            Pengiriman
        </div>
        <div class="info-row">
            <span class="info-label">Kurir</span>
            <span class="info-value">JNE Express</span>
        </div>
        <div class="info-row">
            <span class="info-label">No. Resi</span>
            <span class="info-value">{{ $trackingNumber ?? 'TBD' }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Estimasi</span>
            <span class="info-value">2-3 hari kerja</span>
        </div>
    </div>

    <!-- Bantuan Section -->
    <div class="info-section">
        <div class="section-title">
            💬 Bantuan
        </div>
        <div class="info-row" style="border-bottom: 1px solid #F0F0F0; padding: 12px 0; cursor: pointer; color: #8B1538; font-weight: 500;">
            Hubungi Support Team Kami >
        </div>
        <div class="info-row" style="padding: 12px 0; cursor: pointer; color: #8B1538; font-weight: 500;">
            Ringkasan Pesanan >
        </div>
    </div>

    <!-- Ringkasan Pesanan Section -->
    <div class="summary-section">
        <div style="font-weight: bold; color: #333; margin-bottom: 12px; font-size: 15px;">Ringkasan Pesanan</div>
        
        @php
            $lastOrder = session('lastOrder', []);
            $subtotal = 0;
            foreach($lastOrder as $item) {
                $subtotal += $item['harga'] * $item['qty'];
            }
            // Gratis ongkir jika subtotal >= 30.000
            $ongkir = $subtotal >= 30000 ? 0 : 25000;
            $biayaLayanan = 1000;
            $biayaPenanganan = 500;
            $total = $subtotal + $ongkir + $biayaLayanan + $biayaPenanganan;
        @endphp

        <div class="summary-row">
            <span>Subtotal Produk</span>
            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span>Ongkir</span>
            <span>
                @if($subtotal >= 30000)
                    <span style="color: #00AA00; font-weight: bold;">GRATIS</span>
                @else
                    Rp{{ number_format($ongkir, 0, ',', '.') }}
                @endif
            </span>
        </div>
        <div class="summary-row">
            <span>Biaya Layanan</span>
            <span>Rp{{ number_format($biayaLayanan, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span>Biaya Penanganan</span>
            <span>Rp{{ number_format($biayaPenanganan, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row total">
            <span>Total</span>
            <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <div class="info-section">
        <div style="font-weight: bold; color: #333; margin-bottom: 12px; font-size: 15px;">Metode Pembayaran</div>
        <div class="info-row">
            <span class="info-label">{{ $paymentMethod ?? 'COD' }}</span>
            <span class="info-value">{{ $paymentStatus ?? 'Menunggu Pembayaran' }}</span>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        <button class="btn-action btn-secondary" onclick="window.history.back();">Ubah Alamat</button>
        <button class="btn-action btn-primary" onclick="alert('Pembatalan pesanan - fitur coming soon');">Batalkan Pesanan</button>
    </div>
</div>

@endsection
