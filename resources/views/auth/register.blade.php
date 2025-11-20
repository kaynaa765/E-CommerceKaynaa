@extends('layouts.main')

@section('title', 'Daftar Akun')

@section('content')
<section class="register-container">
    <h2>Daftar Akun</h2>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap Anda" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Password Anda" required>
        </div>

        <button type="submit" class="btn-register">Daftar</button>

        <p class="login-link">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
        
        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('welcome') }}" style="color: #8B1538; text-decoration: none; font-weight: 500;">← Kembali</a>
        </div>
    </form>
</section>
@endsection