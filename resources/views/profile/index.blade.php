@extends('layouts.main')

@section('title', 'Profil Saya')

@section('content')
<style>
    .profile-container {
        max-width: 500px;
        margin: 20px auto;
        padding: 0;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .profile-header {
        background: linear-gradient(180deg, #FFE8F0 0%, #FFD4E5 100%);
        padding: 30px 20px;
        text-align: center;
        position: relative;
        min-height: 150px;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: white;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        border: 4px solid #E89BB5;
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.2);
    }

    .profile-name {
        font-size: 22px;
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 5px;
    }

    .profile-email {
        font-size: 13px;
        color: #A71D47;
        margin-bottom: 15px;
    }

    .edit-btn {
        background: linear-gradient(135deg, #E89BB5 0%, #FFB6D9 100%);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 20px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
    }

    .edit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.25);
    }

    .back-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.8);
        color: #8B1538;
        border: none;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 13px;
    }

    .back-btn:hover {
        background: white;
        box-shadow: 0 2px 8px rgba(201, 31, 106, 0.2);
    }

    .profile-content {
        padding: 20px;
    }

    .info-section {
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 14px;
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #FFE8F0;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #F0F0F0;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-size: 13px;
        color: #999;
        font-weight: 500;
    }

    .info-value {
        font-size: 14px;
        color: #333;
        font-weight: 600;
        text-align: right;
        flex: 1;
        margin-left: 10px;
    }

    .menu-section {
        margin-bottom: 0;
    }

    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #F0F0F0;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .menu-item:hover {
        background: #FFF5FA;
        padding-left: 10px;
    }

    .menu-icon {
        font-size: 20px;
        margin-right: 12px;
        width: 30px;
        text-align: center;
    }

    .menu-label {
        flex: 1;
        font-size: 14px;
        font-weight: 500;
    }

    .menu-arrow {
        color: #CCC;
        font-size: 16px;
    }

    .logout-btn {
        background: linear-gradient(135deg, #FFB6D9 0%, #FFC0D4 100%);
        color: #8B1538;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
        font-size: 14px;
    }

    .logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.2);
    }

    .success-message {
        background: #D4EDDA;
        color: #155724;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 13px;
    }
</style>

<div class="profile-container">
    @if (session('success'))
        <div style="padding: 20px;">
            <div class="success-message">
                ✓ {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Header -->
    <div class="profile-header">
        <a href="{{ route('siswa.dashboard') }}" class="back-btn">← Kembali</a>
        <div class="profile-avatar">👤</div>
        <div class="profile-name">{{ $user->name }}</div>
        <div class="profile-email">{{ $user->email }}</div>
        <a href="{{ route('profile.edit') }}" class="edit-btn">Edit Profil</a>
    </div>

    <!-- Content -->
    <div class="profile-content">
        <!-- Informasi Akun -->
        <div class="info-section">
            <div class="section-title">📋 Informasi Akun</div>
            <div class="info-item">
                <div class="info-label">Nama</div>
                <div class="info-value">{{ $user->name }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">No. Telepon</div>
                <div class="info-value">{{ $user->phone ?? '-' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $user->address ?? '-' }}</div>
            </div>
        </div>

        <!-- Menu Akun -->
        <div class="menu-section">
            <div class="section-title">⚙️ Pengaturan</div>
            <a href="{{ route('profile.edit') }}" class="menu-item">
                <span class="menu-icon">✏️</span>
                <span class="menu-label">Edit Profil</span>
                <span class="menu-arrow">›</span>
            </a>
            <a href="{{ route('cart.index') }}" class="menu-item">
                <span class="menu-icon">🛍️</span>
                <span class="menu-label">Keranjang Saya</span>
                <span class="menu-arrow">›</span>
            </a>
            <a href="{{ route('order.detail') }}" class="menu-item">
                <span class="menu-icon">📦</span>
                <span class="menu-label">Pesanan Saya</span>
                <span class="menu-arrow">›</span>
            </a>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">🚪 Logout</button>
        </form>
    </div>
</div>
@endsection
