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
        border-radius: 12px;
        padding: 32px 24px;
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
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        border: 1.5px solid #e8e8e8;
    }

    .data-table thead {
        background: #f8f8f8;
        border-bottom: 2px solid #e8e8e8;
    }

    .data-table th {
        padding: 20px 24px;
        text-align: left;
        font-size: 20px;
        font-weight: 900;
        color: #C91F6A;
        white-space: nowrap;
        background: #fff5fa;
        border-bottom: 2.5px solid #e8e8e8;
    }

    .data-table td {
        padding: 18px 24px;
        border-bottom: 1.5px solid #f0f0f0;
        font-size: 18px;
        color: #333;
        background: #fff;
    }
    .data-table td:nth-child(3),
    .data-table td:nth-child(4),
    .data-table td:nth-child(5),
    .data-table td:nth-child(6) {
        text-align: center;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: flex-start;
        align-items: center;
    }

    .data-table tbody tr:hover {
        background: #fafafa;
    }

    .btn-add, .btn-edit, .btn-delete {
        padding: 14px 28px;
        font-size: 18px;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-block;
        font-weight: 700;
    }

    .btn-add {
        background: #C91F6A;
        color: white;
        border: none;
        margin-bottom: 20px;
    }

    .btn-add:hover {
        background: #9d1545;
        transform: translateY(-2px);
    }

    .btn-edit {
        background: #4CAF50;
        color: white;
        border: none;
    }

    .btn-edit:hover {
        background: #45a049;
    }

    .btn-delete {
        background: #f44336;
        color: white;
        border: none;
    }

    .btn-delete:hover {
        background: #da190b;
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
                <a href="{{ route('stok.index') }}" class="admin-menu-link active">
                    <span class="admin-menu-icon">📦</span>
                    <span>Stok</span>
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
            <h1 class="admin-title">📦 Kelola Stok</h1>
            <div class="admin-user-info">
                👤 {{ Auth::user()->name }}
            </div>
        </div>

        <div class="admin-content">
            @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
            @endif

            <div class="content-header">
                <h2>Daftar Stok Produk</h2>
                <a href="{{ route('stok.create') }}" class="btn-add">➕ Tambah Produk</a>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Terjual</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td><strong>{{ $product->nama }}</strong></td>
                        <td>{{ $product->kategori }}</td>
                        <td><strong>Rp {{ number_format($product->harga, 0, ',', '.') }}</strong></td>
                        <td>
                            @if($product->stok > 50)
                                <span class="stok-badge stok-tinggi">✓ {{ $product->stok }} unit</span>
                            @elseif($product->stok > 10)
                                <span class="stok-badge stok-sedang">⚠ {{ $product->stok }} unit</span>
                            @else
                                <span class="stok-badge stok-rendah">✗ {{ $product->stok }} unit</span>
                            @endif
                        </td>
                        <td>{{ $product->terjual }} unit</td>
                        <td>⭐ {{ $product->rating }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('stok.edit', $product->id) }}" class="btn-edit">✏️ Edit</a>
                                <button class="btn-delete" onclick="openDeleteModal({{ $product->id }}, '{{ $product->nama }}')">🗑️ Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 30px 40px; color: #999;">
                            Belum ada produk. <a href="{{ route('stok.create') }}" style="color: #C91F6A;">Tambah sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">Konfirmasi Hapus</div>
        <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus produk <strong id="productName"></strong>?</p>
        </div>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id, name) {
        document.getElementById('productName').textContent = name;
        document.getElementById('deleteForm').action = '/stok/' + id;
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }

    // Close modal ketika klik di luar modal
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>

@endsection











