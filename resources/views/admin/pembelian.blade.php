@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

<style>
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
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .data-table thead {
        background: #f8f8f8;
        border-bottom: 2px solid #e8e8e8;
    }

    .data-table th {
        padding: 20px 24px;
        text-align: left;
        font-size: 20px;
        font-weight: 800;
        color: #C91F6A;
    }

    .data-table td {
        padding: 18px 24px;
        border-bottom: 1px solid #f0f0f0;
        font-size: 18px;
        color: #333;
    }

    .data-table tbody tr:hover {
        background: #fafafa;
    }

    /* STATISTICS CARD */
    .stats-summary {
        display: flex;
        gap: 32px;
        margin-bottom: 40px;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    .stat-card {
        background: linear-gradient(135deg, #fff0f6 0%, #f8e8ff 100%);
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(201,31,106,0.08);
        padding: 32px 40px;
        min-width: 180px;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-left: 6px solid #C91F6A;
        border-top: 2px solid #e8e8e8;
        border-bottom: 2px solid #e8e8e8;
        margin-bottom: 8px;
        transition: box-shadow 0.2s;
    }
    .stat-card:hover {
        box-shadow: 0 6px 24px rgba(201,31,106,0.15);
    }
    .stat-card h3 {
        color: #C91F6A;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }
    .stat-card .value {
        font-size: 36px;
        font-weight: 800;
        color: #333;
        margin-bottom: 0;
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
                <a href="{{ route('penjualan.index') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">📈</span>
                    <span>Penjualan</span>
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
            <h1 class="admin-title">🛍️ Riwayat Pembelian</h1>
            <div class="admin-user-info">
                👤 {{ Auth::user()->name }}
            </div>
        </div>

        <div class="admin-content">
            <!-- Statistics -->
            <div class="stats-summary">
                <div class="stat-card">
                    <h3>Total Pembelian</h3>
                    <div class="value">{{ $orders->count() }}</div>
                </div>
                <div class="stat-card">
                    <h3>Selesai</h3>
                    <div class="value">{{ $orders->where('status', 'selesai')->count() }}</div>
                </div>
                <div class="stat-card">
                    <h3>Proses</h3>
                    <div class="value">{{ $orders->where('status', 'diproses')->count() + $orders->where('status', 'dikirim')->count() }}</div>
                </div>
                <div class="stat-card">
                    <h3>Pending</h3>
                    <div class="value">{{ $orders->where('status', 'pending')->count() }}</div>
                </div>
            </div>

            <div class="content-header">
                <h2>Daftar Pembelian</h2>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>No. Order</th>
                        <th>Pembeli</th>
                        <th>Alamat</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td><strong>{{ $order->nomor_order }}</strong></td>
                        <td>{{ $order->penerima }}</td>
                        <td>{{ $order->alamat }}, {{ $order->kota }}</td>
                        <td class="price">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="metode-badge">
                                @if($order->metode_pembayaran == 'transfer_bank')
                                    🏦 Transfer
                                @elseif($order->metode_pembayaran == 'e_wallet')
                                    📱 E-Wallet
                                @else
                                    🚚 COD
                                @endif
                            </span>
                        </td>
                        <td>
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
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('pembelian.show', $order->id) }}" class="btn-view">👁️ Lihat</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 30px 40px; color: #999;">
                            Belum ada data pembelian
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>

@endsection












