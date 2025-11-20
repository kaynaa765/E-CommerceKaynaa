@extends('layouts.main')

@section('title', 'Login Akun')

@section('content')
<section class="register-container">
    <h2>Login Akun</h2>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password Anda" required>
        </div>

        <button type="submit" class="btn-register">Login</button>

        <p class="login-link">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
        
        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('welcome') }}" style="color: #8B1538; text-decoration: none; font-weight: 500;">← Kembali</a>
        </div>
    </form>
</section>
@endsection
