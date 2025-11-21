@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

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
        .content-header {
            background: linear-gradient(135deg, #f7e7e1 0%, #f8f5f2 100%);
            border-radius: 14px;
            padding: 18px 16px;
            margin-bottom: 18px;
            color: #a97c5a;
            text-align: center;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            width: 100%;
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
        }
        .product-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.07);
            padding: 12px 8px 16px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 0;
        }
        .product-card img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 8px;
            background: #f8f5f2;
        }
        .product-name {
            font-size: 14px;
            color: #a97c5a;
            font-weight: bold;
            margin-bottom: 4px;
            text-align: center;
        }
        .product-price {
            font-size: 13px;
            color: #7c6a5a;
            margin-bottom: 4px;
            text-align: center;
        }
        .product-rating {
            font-size: 12px;
            color: #FFD700;
            margin-bottom: 4px;
            text-align: center;
        }
        .action-buttons {
            display: flex;
            gap: 6px;
            margin-top: 6px;
        }
        .btn-edit, .btn-delete {
            background: linear-gradient(135deg, #a97c5a 0%, #7c6a5a 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-edit:hover, .btn-delete:hover {
            background: #7c6a5a;
        }
        @media (max-width: 600px) {
            .admin-main {
                max-width: 100vw;
                border-radius: 0;
            }
            .products-grid {
                gap: 10px;
            }
            .product-card {
                padding: 8px 2px 12px 2px;
            }
            .product-card img {
                width: 70px;
                height: 70px;
            }
        }
        /* Grid produk 2 kolom di mobile */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            width: 100%;
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
        }
        .product-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
            padding: 12px 8px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product-card img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .product-card .product-name {
            font-size: 14px;
            font-weight: bold;
            color: #C91F6A;
            margin-bottom: 4px;
        }
        .product-card .product-price {
            font-size: 13px;
            color: #333;
            margin-bottom: 4px;
        }
        .product-card .product-rating {
            font-size: 12px;
            color: #FFD700;
            margin-bottom: 4px;
        }
        .product-card .action-buttons {
            display: flex;
            gap: 6px;
            margin-top: 6px;
        }
        @media (max-width: 600px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .product-card img {
                width: 70px;
                height: 70px;
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
            <div class="products-grid">
                <div class="product-card">
                    <img src="{{ asset('images/lipstick.jpg') }}" alt="Lipstick" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Lipstick Matte Rose Pink</div>
                    <div class="product-price">Rp 85.000</div>
                    <div class="product-rating">⭐ 4.8</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/foundation.jpg') }}" alt="Foundation" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Foundation Liquid Natural Beige</div>
                    <div class="product-price">Rp 125.000</div>
                    <div class="product-rating">⭐ 4.7</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/mascara.jpg') }}" alt="Mascara" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Mascara Volume Black</div>
                    <div class="product-price">Rp 65.000</div>
                    <div class="product-rating">⭐ 4.9</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/blush.jpg') }}" alt="Blush" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Blush On Coral Glow</div>
                    <div class="product-price">Rp 55.000</div>
                    <div class="product-rating">⭐ 4.6</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/eyeshadow.jpg') }}" alt="Eyeshadow" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Eyeshadow Palette Nude</div>
                    <div class="product-price">Rp 95.000</div>
                    <div class="product-rating">⭐ 4.7</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('images/cleanser.jpg') }}" alt="Cleanser" onerror="this.src='https://via.placeholder.com/50'">
                    <div class="product-name">Facial Cleanser Gentle</div>
                    <div class="product-price">Rp 75.000</div>
                    <div class="product-rating">⭐ 4.8</div>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="alert('Edit produk')">Edit</button>
                        <button class="btn-delete" onclick="alert('Hapus produk')">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection












