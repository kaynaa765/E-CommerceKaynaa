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
        padding: 40px 24px;
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
        border-radius: 16px;
        padding: 48px 56px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        min-height: 600px;
        width: 100%;
        text-align: left;
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

    .welcome-message {
        background: linear-gradient(135deg, #FFE8F0 0%, #FFF0F6 100%);
        padding: 40px 48px;
        border-radius: 14px;
        border-left: 5px solid #C91F6A;
        margin-bottom: 56px;
        width: 100%;
        max-width: 100%;
        font-size: 22px;
    }

    .welcome-message h3 {
        color: #C91F6A;
        margin-bottom: 22px;
        font-size: 28px;
        font-weight: 700;
    }

    .welcome-message p {
        color: #666;
        font-size: 18px;
        line-height: 1.8;
    }

    .quick-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
        margin-bottom: 50px;
    }

    .stat-card {
        background: white;
        padding: 45px;
        border-radius: 12px;
        border-top: 4px solid #C91F6A;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        text-align: center;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    }

    .stat-card .stat-icon {
        font-size: 60px;
        margin-bottom: 22px;
    }

    .stat-card .stat-label {
        color: #999;
        font-size: 14px;
        margin-bottom: 16px;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .stat-card .stat-value {
        color: #C91F6A;
        font-size: 48px;
        font-weight: 700;
    }

    /* RESPONSIVE */
    @media (max-width: 1024px) {
        .admin-sidebar {
            width: 240px;
        }
        .admin-main {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 30px 40px;
        }
        .quick-stats {
            grid-template-columns: repeat(2, 1fr);
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
        .quick-stats {
            grid-template-columns: repeat(1, 1fr);
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
                <a href="{{ route('admin.dashboard') }}" class="admin-menu-link active">
                    <span class="admin-menu-icon">📊</span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('admin.produk') }}" class="admin-menu-link">
                    <span class="admin-menu-icon">📦</span>
                    <span>Produk Kosmetik</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="{{ route('pembelian.index') }}" class="admin-menu-link">
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
            <h1 class="admin-title">Admin Dashboard</h1>
            <div class="admin-user-info">
                👤 {{ Auth::user()->name }} ({{ Auth::user()->email }})
            </div>
        </div>

        <div class="admin-content">
            <div class="welcome-message">
                <h3>👋 Selamat Datang di Admin Dashboard!</h3>
                <p>Kelola semua aspek toko Kayna Beauty dari sini. Gunakan menu di sidebar untuk navigasi.</p>
            </div>

            <div style="width: 100%; text-align: center;">
                <div class="admin-content-icon">📊</div>
                <h2>Admin Dashboard</h2>
                <p>Sistem manajemen toko Kayna Beauty siap digunakan</p>
            </div>

            <div class="quick-stats">
                <div class="stat-card">
                    <div class="stat-icon">📦</div>
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-value">12</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👥</div>
                    <div class="stat-label">Total Siswa</div>
                    <div class="stat-value">25</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🛒</div>
                    <div class="stat-label">Total Pesanan</div>
                    <div class="stat-value">8</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">💰</div>
                    <div class="stat-label">Total Penjualan</div>
                    <div class="stat-value">Rp5.2M</div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection






