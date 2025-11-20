@extends('Layouts.main')

@section('content')
<style>
    .success-container {
        max-width: 600px;
        margin: 0 auto;
        height: 100vh;
        background: linear-gradient(180deg, #FFFBF5 0%, #FFE8F0 25%, #FFD4E5 50%, #FFB6D9 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .success-card {
        background: white;
        border-radius: 20px;
        padding: 40px 25px;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        max-width: 400px;
        width: 100%;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #FFB6D9 0%, #FFD4E5 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 48px;
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.2);
    }

    .success-title {
        font-size: 24px;
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 12px;
    }

    .success-subtitle {
        font-size: 14px;
        color: #666;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .order-details {
        background: #FFF0F6;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
        text-align: left;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #FFD4E5;
        font-size: 14px;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #666;
        font-weight: 500;
    }

    .detail-value {
        color: #8B1538;
        font-weight: bold;
    }

    .btn-success {
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        border: none;
        padding: 14px 32px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 15px;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #C91F6A;
        border: 2px solid #C91F6A;
        padding: 12px 28px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin: 0 10px;
    }

    .btn-secondary:hover {
        background: #FFF0F6;
    }

    .order-number {
        font-size: 12px;
        color: #999;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #EEE;
    }

    @media (max-width: 480px) {
        .success-card {
            padding: 30px 20px;
            border-radius: 15px;
        }

        .success-title {
            font-size: 20px;
        }

        .success-subtitle {
            font-size: 13px;
        }

        .btn-success {
            width: calc(100% - 64px);
        }

        .btn-secondary {
            margin: 10px auto;
            display: block;
            width: calc(100% - 56px);
        }
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="success-icon">👤</div>
        
        <div class="success-title">Terima Kasih Atas Pesanan Anda!</div>
        
        <div class="success-subtitle">
            Kami telah menerima pesanan Anda dan akan segera memproses pengiriman
        </div>

        <div class="order-details">
            <div class="detail-row">
                <span class="detail-label">Nomor Pesanan</span>
                <span class="detail-value">#{{ $orderNumber ?? 'KYN' . date('YmdHis') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Metode Pembayaran</span>
                <span class="detail-value">{{ strtoupper($paymentMethod ?? 'COD') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Pesanan</span>
                <span class="detail-value">Rp{{ number_format($totalAmount ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value" style="color: #00AA00;">Diproses</span>
            </div>
        </div>

        <a href="{{ route('order.detail') }}" class="btn-success">Lihat Pesanan</a>

        <div>
            <a href="{{ route('siswa.dashboard') }}" class="btn-secondary">Belanja Lagi</a>
        </div>

        <div class="order-number">
            Anda akan menerima email konfirmasi dalam beberapa menit
        </div>
    </div>
</div>

@endsection
