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
                <a href="{{ route('admin.produk') }}" class="admin-menu-link active">
                    <span class="admin-menu-icon">📦</span>
                    <span>Produk Kosmetik</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#" class="admin-menu-link">
                    <span class="admin-menu-icon">👥</span>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#" class="admin-menu-link">
                    <span class="admin-menu-icon">🛒</span>
                    <span>Penjualan</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#" class="admin-menu-link">
                    <span class="admin-menu-icon">📋</span>
                    <span>Pesanan</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#" class="admin-menu-link">
                    <span class="admin-menu-icon">⚙️</span>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#" class="admin-menu-link">
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
            <h1 class="admin-title">📦 Produk Kosmetik</h1>
            <div class="admin-user-info">
                👤 {{ Auth::user()->name }}
            </div>
        </div>

        <div class="admin-content">
            <div class="content-header">
                <h2>Daftar Produk</h2>
                <button class="btn-add" onclick="alert('Fitur tambah produk akan segera tersedia')">➕ Tambah Produk</button>
            </div>

            <table class="products-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Rating</th>
                        <th>Terjual</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{ asset('images/lipstick.jpg') }}" alt="Lipstick" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Lipstick Matte Rose Pink</td>
                        <td>Makeup</td>
                        <td class="price">Rp 85.000</td>
                        <td>⭐ 4.8</td>
                        <td>156</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/foundation.jpg') }}" alt="Foundation" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Foundation Liquid Natural Beige</td>
                        <td>Makeup</td>
                        <td class="price">Rp 125.000</td>
                        <td>⭐ 4.7</td>
                        <td>203</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/mascara.jpg') }}" alt="Mascara" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Mascara Volume Black</td>
                        <td>Makeup</td>
                        <td class="price">Rp 65.000</td>
                        <td>⭐ 4.9</td>
                        <td>289</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/blush.jpg') }}" alt="Blush" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Blush On Coral Glow</td>
                        <td>Makeup</td>
                        <td class="price">Rp 55.000</td>
                        <td>⭐ 4.6</td>
                        <td>124</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/eyeshadow.jpg') }}" alt="Eyeshadow" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Eyeshadow Palette Nude</td>
                        <td>Makeup</td>
                        <td class="price">Rp 95.000</td>
                        <td>⭐ 4.7</td>
                        <td>178</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="{{ asset('images/cleanser.jpg') }}" alt="Cleanser" class="product-img" onerror="this.src='https://via.placeholder.com/50'"></td>
                        <td>Facial Cleanser Gentle</td>
                        <td>Skincare</td>
                        <td class="price">Rp 75.000</td>
                        <td>⭐ 4.8</td>
                        <td>312</td>
                        <td><span class="status-badge status-active">✓ Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                                <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

@endsection












