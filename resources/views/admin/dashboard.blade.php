@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<style>
    .admin-mobile-container { max-width: 480px; margin: 0 auto; background: #f8f5f2; min-height: 100vh; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.04); padding-bottom: 40px; }
    .admin-header-bar { display: flex; flex-direction: column; align-items: center; background: #fff; border-radius: 16px 16px 0 0; box-shadow: 0 1px 4px rgba(0,0,0,0.07); padding: 16px 0 0 0; margin-bottom: 0; position: relative; }
    .admin-logo { font-size: 20px; font-weight: bold; color: #a97c5a; margin-bottom: 2px; }
    .admin-role { font-size: 12px; color: #7c6a5a; margin-bottom: 8px; }
    .admin-menu-bar { display: flex; justify-content: space-around; width: 100%; background: #fff; border-radius: 0 0 16px 16px; box-shadow: 0 1px 4px rgba(0,0,0,0.03); margin-bottom: 8px; }
    .admin-menu-link { display: flex; flex-direction: column; align-items: center; gap: 2px; color: #a97c5a; text-decoration: none; font-size: 13px; font-weight: 500; padding: 8px 0; border: none; background: none; cursor: pointer; transition: all 0.2s; }
    .admin-menu-link.active { color: #C91F6A; font-weight: bold; border-bottom: 2px solid #C91F6A; }
    .admin-menu-icon { font-size: 18px; }
    .admin-logout-btn { position: absolute; top: 16px; right: 16px; width: auto; margin: 0; padding: 6px 18px; background: linear-gradient(135deg,#C91F6A 0%,#9d1545 100%); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 13px; display: block; }
</style>
<div class="admin-mobile-container">
    <div class="admin-header-bar" style="padding-bottom:0;">
        <div style="display:flex;align-items:center;justify-content:space-between;width:100%;padding:0 16px;">
            <div style="display:flex;align-items:center;gap:10px;">
                <span style="font-size:32px;">📊</span>
                <span style="font-size:28px;font-weight:bold;">Admin Dashboard</span>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST" style="margin:0;">
                @csrf
                <button type="submit" class="admin-logout-btn">🚪 Logout</button>
            </form>
        </div>
        <div style="text-align:left;padding:0 16px 8px 16px;font-size:15px;color:#444;">
            <span style="font-size:18px;">👤 Admin</span>
        </div>
        <nav class="admin-menu-bar">
            <a href="{{ route('admin.dashboard') }}" class="admin-menu-link active"><span class="admin-menu-icon">📊</span>Dashboard</a>
            <a href="{{ route('stok.index') }}" class="admin-menu-link"><span class="admin-menu-icon">📦</span>Stok</a>
            <a href="{{ route('pembelian.index') }}" class="admin-menu-link"><span class="admin-menu-icon">🛍️</span>Pembelian</a>
            <a href="{{ route('penjualan.index') }}" class="admin-menu-link"><span class="admin-menu-icon">📈</span>Penjualan</a>
            <a href="{{ route('admin.pengaturan') }}" class="admin-menu-link"><span class="admin-menu-icon">⚙️</span>Pengaturan</a>
            <a href="{{ route('admin.admin') }}" class="admin-menu-link"><span class="admin-menu-icon">👤</span>Admin</a>
        </nav>
    </div>
    <main class="admin-main" style="width:100%;margin:0;background:#f8f5f2;min-height:100vh;padding-bottom:40px;box-sizing:border-box;">
        <!-- Konten utama tampil di sini -->
    </main>
</div>

<style>
        body {
            background: #f8f5f2;
        }
        .admin-main {
            width: 100%;
            margin: 0;
            background: #f8f5f2;
            min-height: 100vh;
            padding-bottom: 80px;
            box-sizing: border-box;
        }
        .admin-header {
            padding: 16px 8px 0 8px;
            background: #f8f5f2;
            border-radius: 16px;
            margin-bottom: 18px;
            align-items: center;
            display: flex;
            justify-content: space-between;
        }
        .admin-title {
            font-size: 22px;
            color: #a97c5a;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .admin-user-info {
            font-size: 14px;
            color: #7c6a5a;
            background: #fff;
            border-radius: 8px;
            padding: 8px 14px;
        }
        .admin-content {
            background: #fff;
            border-radius: 16px;
            padding: 18px 16px;
            margin-bottom: 18px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.07);
        }
        .welcome-message {
            background: linear-gradient(135deg, #f7e7e1 0%, #f8f5f2 100%);
            border-radius: 14px;
            padding: 18px 16px;
            margin-bottom: 18px;
            color: #a97c5a;
        }
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 18px;
        }
        .stat-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.07);
            padding: 12px 8px 16px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 0;
        }
        .stat-icon {
            font-size: 32px;
            margin-bottom: 8px;
            color: #a97c5a;
        }
        .stat-label {
            font-size: 13px;
            color: #7c6a5a;
            margin-bottom: 4px;
            text-align: center;
        }
        .stat-value {
            font-size: 18px;
            color: #a97c5a;
            font-weight: bold;
            margin-bottom: 4px;
            text-align: center;
        }
        @media (max-width: 600px) {
            .admin-main {
                max-width: 100vw;
                border-radius: 0;
            }
            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .stat-card {
                padding: 8px 2px 12px 2px;
            }
        }
        /* Konten utama admin agar maksimal 480px dan di tengah layar */
        .admin-main {
            max-width: 480px;
            margin: 0 auto;
            padding: 24px 8px;
            background: #f8f8f8;
            min-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            box-sizing: border-box;
        }
        .admin-content {
            background: white;
            border-radius: 16px;
            padding: 24px 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            min-height: 400px;
            width: 100%;
            text-align: left;
            box-sizing: border-box;
        }
        .admin-content-icon {
            font-size: 70px;
            margin-bottom: 24px;
            opacity: 0.9;
            width: 100%;
            text-align: center;
        }
        .quick-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border-top: 4px solid #C91F6A;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-align: center;
        }
        .stat-card .stat-icon {
            font-size: 40px;
            margin-bottom: 12px;
        }
        @media (max-width: 600px) {
            .admin-main {
                max-width: 100vw;
                padding-left: 4vw;
                padding-right: 4vw;
            }
            .admin-content {
                padding: 16px 4vw;
            }
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






