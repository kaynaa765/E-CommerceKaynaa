@extends('layouts.main')

@section('title', 'Edit Profil')

@section('content')
<style>
    .edit-profile-container {
        max-width: 500px;
        margin: 20px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .edit-profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .edit-profile-header h2 {
        font-size: 24px;
        font-weight: bold;
        color: #8B1538;
        margin-bottom: 10px;
    }

    .edit-profile-header p {
        color: #999;
        font-size: 13px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #8B1538;
        font-weight: 600;
        font-size: 13px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #E8E8E8;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: inherit;
    }

    .form-group input:focus {
        outline: none;
        border-color: #E89BB5;
        background: #FFF8FB;
    }

    .form-group input::placeholder {
        color: #CCC;
    }

    .form-error {
        color: #DC3545;
        font-size: 12px;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-save {
        background: linear-gradient(135deg, #E89BB5 0%, #FFB6D9 100%);
        color: white;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 31, 106, 0.25);
    }

    .btn-cancel {
        background: #F0F0F0;
        color: #333;
    }

    .btn-cancel:hover {
        background: #E8E8E8;
    }

    .success-message {
        background: #D4EDDA;
        color: #155724;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 13px;
    }
</style>

<div class="edit-profile-container">
    @if (session('success'))
        <div class="success-message">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="edit-profile-header">
        <h2>Edit Profil</h2>
        <p>Perbarui informasi akun Anda</p>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">👤 Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap" required>
            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">📧 Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email" required>
            @error('email')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">📱 No. Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="Masukkan no. telepon">
            @error('phone')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">🏠 Alamat</label>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" placeholder="Masukkan alamat">
            @error('address')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('profile.show') }}" class="btn btn-cancel">Batal</a>
            <button type="submit" class="btn btn-save">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
