@extends('layouts.main')

@section('title', 'Login Admin')

@section('content')
<style>
    .admin-login-container {
        max-width: 500px;
        margin: 60px auto;
        padding: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(201, 31, 106, 0.15);
    }

    .admin-login-container h2 {
        text-align: center;
        color: #8B1538;
        margin-bottom: 10px;
        font-size: 28px;
    }

    .admin-login-container .subtitle {
        text-align: center;
        color: #999;
        margin-bottom: 30px;
        font-size: 14px;
    }

    .admin-icon {
        text-align: center;
        font-size: 48px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #8B1538;
        font-weight: 600;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #E8E8E8;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #C91F6A;
        background: #FFF8FB;
    }

    .form-group input::placeholder {
        color: #CCC;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #C91F6A 0%, #8B1538 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(139, 21, 56, 0.3);
        margin-top: 10px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(139, 21, 56, 0.4);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .login-links {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        font-size: 13px;
    }

    .login-links a {
        color: #C91F6A;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .login-links a:hover {
        text-decoration: underline;
    }

    .divider {
        text-align: center;
        margin: 25px 0;
        color: #CCC;
        font-size: 13px;
    }

    .divider::before {
        content: '';
        display: inline-block;
        width: 45%;
        height: 1px;
        background: #E8E8E8;
        vertical-align: middle;
        margin-right: 10px;
    }

    .divider::after {
        content: '';
        display: inline-block;
        width: 45%;
        height: 1px;
        background: #E8E8E8;
        vertical-align: middle;
        margin-left: 10px;
    }

    .back-to-home {
        text-align: center;
        margin-top: 20px;
    }

    .back-to-home a {
        color: #8B1538;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .back-to-home a:hover {
        text-decoration: underline;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #f5c6cb;
        font-size: 13px;
    }

    .error-message ul {
        margin: 0;
        padding-left: 20px;
    }

    @media (max-width: 480px) {
        .admin-login-container {
            margin: 30px 15px;
            padding: 25px;
        }

        .admin-login-container h2 {
            font-size: 24px;
        }

        .admin-icon {
            font-size: 40px;
        }
    }
</style>

<div class="admin-login-container">
    <div class="admin-icon">👨‍💼</div>
    
    <h2>Login Admin</h2>
    <p class="subtitle">Masuk ke dashboard admin untuk mengelola toko</p>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="error-message">
            <ul>
                <li>{{ session('error') }}</li>
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}" id="adminLoginForm">
        @csrf

        <div class="form-group">
            <label for="email">📧 Email Admin</label>
            <input type="email" id="email" name="email" placeholder="admin@kaynaabeauty.com" value="{{ old('email') }}" required>
            <small style="color: #999; display: block; margin-top: 5px;">Contoh: admin@kaynaabeauty.com</small>
        </div>

        <div class="form-group">
            <label for="password">🔐 Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            <small style="color: #999; display: block; margin-top: 5px;">Default: password123</small>
        </div>

        <button type="submit" class="btn-login" id="submitBtn">Login ke Dashboard</button>

        <div class="login-links">
            <a href="{{ route('login') }}">← Kembali ke Login Pelanggan</a>
            <a href="/">Kembali ke Home →</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
        console.log('Admin login form submitted');
        console.log('Action:', this.action);
        console.log('Method:', this.method);
        console.log('Email:', document.getElementById('email').value);
    });
</script>

@endsection
