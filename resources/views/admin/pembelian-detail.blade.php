@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

<style>
    body {
        background: #f8f5f2;
    }
    .admin-main {
        max-width: 480px;
        margin: 0 auto;
        background: #f8f5f2;
        min-height: 100vh;
        padding-bottom: 80px;
        box-sizing: border-box;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        background: #f8f8f8;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', 'Roboto', sans-serif;
    }

    .admin-container {
        display: flex;
        min-height: 100vh;
        width: 100%;
        background: #f8f8f8;
    }

    /* SIDEBAR */
    .admin-sidebar {
        width: 280px;
        background: white;
        padding: 30px 0;
        border-right: 1px solid #e8e8e8;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        left: 0;
        top: 0;
        z-index: 1000;
        box-shadow: 2px 0 6px rgba(0, 0, 0, 0.06);
    }

    .admin-sidebar-header {
        padding: 20px 25px;
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
        margin-bottom: 30px;
    }

    .admin-sidebar-header .logo {
        font-size: 22px;
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
    }

    .admin-sidebar-header .role {
        font-size: 12px;
        color: #999;
        font-weight: 500;
    }

    .admin-menu {
        list-style: none;
    }

    .admin-menu-item {
        margin: 0;
        padding: 0;
    }

    .admin-menu-link {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 25px;
        color: #666;
        text-decoration: none;
        border-left: 3px solid transparent;
        transition: all 0.2s ease;
        font-size: 14px;
        font-weight: 500;
        margin: 4px 0;
    }

    .admin-menu-link:hover {
        background: #fafafa;
        color: #C91F6A;
        border-left-color: #C91F6A;
    }

    .admin-menu-link.active {
        background: #fff5f8;
        color: #C91F6A;
        border-left-color: #C91F6A;
        font-weight: 600;
    }

    .admin-menu-icon {
        font-size: 20px;
        width: 24px;
        text-align: center;
    }

    .admin-sidebar-footer {
        position: absolute;
        bottom: 25px;
        left: 20px;
        right: 20px;
    }

    .admin-logout-btn {
        width: 100%;
        padding: 13px 20px;
        background: linear-gradient(135deg, #C91F6A 0%, #9d1545 100%);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
    }

    .admin-logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.3);
    }

    /* MAIN CONTENT */
    .admin-main {
        margin-left: 280px;
        padding: 45px 55px;
        background: #f8f8f8;
        width: calc(100% - 280px);
        min-height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 50px;
        padding-bottom: 25px;
        border-bottom: 2px solid #e8e8e8;
    }

    .admin-title {
        font-size: 42px;
        font-weight: 700;
        color: #333;
    }

    .admin-user-info {
        background: white;
        padding: 18px 28px;
        border-radius: 8px;
        color: #555;
        font-size: 16px;
        border-left: 3px solid #C91F6A;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .admin-content {
        background: white;
        border-radius: 12px;
        padding: 60px 80px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        min-height: 550px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .admin-content-icon {
        font-size: 90px;
        margin-bottom: 40px;
        opacity: 0.9;
    }

    .admin-content h2 {
        font-size: 44px;
        color: #C91F6A;
        margin-bottom: 35px;
        font-weight: 700;
    }

    .admin-content p {
        color: #888;
        font-size: 20px;
        margin-bottom: 40px;
        line-height: 1.9;
    }

    .breadcrumb {
        font-size: 13px;
        color: #999;
        margin-bottom: 25px;
    }

    .data-table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    .data-table thead {
        background: #f8f8f8;
        border-bottom: 2px solid #e8e8e8;
    }

    .data-table th {
        padding: 18px 20px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .data-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
        color: #555;
    }

    .data-table tbody tr:hover {
        background: #fafafa;
    }

    @media (max-width: 1024px) {
        .admin-sidebar {
            width: 240px;
        }
        .admin-main {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 30px 40px;
        }
    }

    @media (max-width: 768px) {
        .admin-container {
            flex-direction: column;
        }
        .admin-sidebar {
            width: 100%;
            height: auto;
            position: relative;
            padding-bottom: 80px;
        }
        .admin-sidebar-footer {
            position: relative;
            bottom: auto;
            margin-top: 20px;
        }
        .admin-main {
            margin-left: 0;
            width: 100%;
            padding: 25px;
        }
        .admin-title {
            font-size: 28px;
        }
    }
</style></style>

<div class="admin-container">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <div class="logo">Kayna Beauty</div>
            <div class="role">👨‍💼 Admin Dashboard</div>
        </div>

        <ul class="admin-menu">
            <li class="admin-menu-item">
                <a href="{{ route('admin.dashboard') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">📊</span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('stok.index') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">📦</span>
                    <span>Stok</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('pembelian.index') }}" class="admin-menu-link active">
                    <span class="admin-menu-icon">🛍️</span>
                    <span>Pembelian</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('admin.pesanan') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">📋</span>
                    <span>Pesanan</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('admin.pengaturan') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">⚙️</span>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('admin.admin') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">👤</span>
                    <span>Admin</span>
                </a>
            </li>
        </ul>

        <div class="admin-sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="admin-logout-btn">🚪 Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <div class="admin-header">
            <h1 class="admin-title">📋 Detail Pembelian</h1>
            <div class="admin-user-info">
                👤 {{ Auth::user()->name }}
            </div>
        </div>

        <div class="admin-content">
            <a href="{{ route('pembelian.index') }}" class="back-button">← Kembali</a>

            <div class="detail-header">
                <div>
                    <h2>{{ $order->nomor_order }}</h2>
                    <p style="color: #999; font-size: 17px; margin-top: 5px;">{{ $order->created_at->format('d F Y, H:i') }}</p>
                </div>
                <span class="status-badge status-{{ $order->status }}">
                    @if($order->status == 'pending')
                        ⏳ Pending
                    @elseif($order->status == 'diproses')
                        ⚙️ Diproses
                    @elseif($order->status == 'dikirim')
                        📦 Dikirim
                    @elseif($order->status == 'selesai')
                        ✓ Selesai
                    @else
                        ✗ Dibatalkan
                    @endif
                </span>
            </div>

            <div class="detail-grid">
                <!-- Info Pembeli -->
                <div class="detail-section">
                    <h3>👤 Informasi Pembeli</h3>
                    <div class="detail-item">
                        <span class="detail-label">Nama</span>
                        <span class="detail-value">{{ $order->user->name }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <span class="detail-value">{{ $order->user->email }}</span>
                    </div>
                </div>

                <!-- Info Pengiriman -->
                <div class="detail-section">
                    <h3>🚚 Informasi Pengiriman</h3>
                    <div class="detail-item">
                        <span class="detail-label">Penerima</span>
                        <span class="detail-value">{{ $order->penerima }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">No. HP</span>
                        <span class="detail-value">{{ $order->no_hp }}</span>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="detail-section">
                    <h3>📍 Alamat</h3>
                    <div class="detail-item">
                        <span class="detail-label">Jalan</span>
                        <span class="detail-value">{{ $order->alamat }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kota</span>
                        <span class="detail-value">{{ $order->kota }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Provinsi</span>
                        <span class="detail-value">{{ $order->provinsi }}</span>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="detail-section">
                    <h3>💳 Metode Pembayaran</h3>
                    <div class="detail-item">
                        <span class="detail-label">Metode</span>
                        <span class="detail-value">
                            <span class="metode-badge">
                                @if($order->metode_pembayaran == 'transfer_bank')
                                    🏦 Transfer Bank
                                @elseif($order->metode_pembayaran == 'e_wallet')
                                    📱 E-Wallet
                                @else
                                    🚚 COD (Bayar di Tempat)
                                @endif
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pembayaran -->
            <div class="summary-section">
                <h3 style="color: #8B1538; margin-bottom: 22px; font-weight: bold;">💰 Ringkasan Pembayaran</h3>
                
                <div class="summary-item">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                
                <div class="summary-item">
                    <span class="summary-label">Ongkos Kirim</span>
                    <span class="summary-value">Rp {{ number_format($order->ongkir, 0, ',', '.') }}</span>
                </div>
                
                <div class="summary-item total">
                    <span class="summary-label">Total Pembayaran</span>
                    <span class="summary-value">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
            </div>

            @if($order->catatan)
            <div class="detail-section" style="margin-top: 20px;">
                <h3>📝 Catatan</h3>
                <p style="color: #333; font-size: 18px; line-height: 1.5;">{{ $order->catatan }}</p>
            </div>
            @endif
        </div>
    </main>
</div>

@endsection












