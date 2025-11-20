@extends('layouts.main')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        max-width: 800px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .login-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(201, 31, 106, 0.15);
        text-align: center;
        transition: all 0.3s ease;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(201, 31, 106, 0.25);
    }

    .login-card .icon {
        font-size: 64px;
        margin-bottom: 15px;
    }

    .login-card h2 {
        color: #8B1538;
        margin-bottom: 10px;
        font-size: 24px;
    }

    .login-card p {
        color: #999;
        font-size: 13px;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .login-card a {
        display: inline-block;
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        padding: 14px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
    }

    .login-card a:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .divider {
        text-align: center;
        margin: 50px 0;
        position: relative;
    }

    .divider::before {
        content: '';
        display: block;
        height: 2px;
        background: linear-gradient(to right, transparent, #E8E8E8, transparent);
        margin-bottom: 15px;
    }

    .divider span {
        color: #999;
        font-size: 13px;
        background: white;
        padding: 0 15px;
    }

    .info-box {
        background: linear-gradient(135deg, #FFE8F0 0%, #FFF0F6 100%);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid #C91F6A;
        margin-bottom: 30px;
    }

    .info-box h3 {
        color: #8B1538;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .info-box p {
        color: #666;
        font-size: 13px;
        margin: 5px 0;
    }

    @media (max-width: 768px) {
        .login-container {
            margin: 30px auto;
        }

        .login-options {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .login-card {
            padding: 30px 20px;
        }

        .login-card h2 {
            font-size: 20px;
        }

        .login-card .icon {
            font-size: 48px;
        }
    }
</style>

<div class="login-container">
    <div class="info-box">
        <h3>🔐 Pilih Jenis Login</h3>
        <p>Silakan pilih apakah Anda ingin login sebagai pelanggan/siswa atau sebagai admin untuk mengelola toko.</p>
    </div>

    <div class="login-options">
        <!-- Customer Login Card -->
        <div class="login-card">
            <div class="icon">👤</div>
            <h2>Login Pelanggan</h2>
            <p>Masuk sebagai pelanggan untuk berbelanja produk kecantikan terbaik di Kayna Beauty.</p>
            <a href="{{ route('login') }}">Login Pelanggan →</a>
        </div>

        <!-- Admin Login Card -->
        <div class="login-card">
            <div class="icon">👨‍💼</div>
            <h2>Login Admin</h2>
            <p>Masuk sebagai admin untuk mengelola produk, pesanan, dan keseluruhan toko Kayna Beauty.</p>
            <a href="{{ route('admin.login') }}">Login Admin →</a>
        </div>
    </div>

    <div class="divider">
        <span>Belum punya akun?</span>
    </div>

    <div style="text-align: center;">
        <p style="color: #666; margin-bottom: 15px;">Daftar sekarang untuk menjadi pelanggan Kayna Beauty</p>
        <a href="{{ route('register') }}" style="display: inline-block; background: linear-gradient(135deg, #FFB6D9 0%, #FFC0D4 100%); color: #8B1538; padding: 12px 30px; border-radius: 10px; text-decoration: none; font-weight: bold; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(201, 31, 106, 0.2);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(201, 31, 106, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(201, 31, 106, 0.2)'">
            📝 Daftar Sekarang
        </a>
    </div>

    <div style="text-align: center; margin-top: 2rem;">
        <a href="{{ route('welcome') }}" style="color: #8B1538; text-decoration: none; font-weight: 500;">← Kembali</a>
    </div>
</div>

@endsection
