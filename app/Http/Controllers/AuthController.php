<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke loading page
        return redirect()->route('auth.loading')->with('success', 'Akun berhasil dibuat! Selamat datang ' . $user->name);
    }

    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.loading')->with('success', 'Login berhasil!');
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'Logout berhasil!');
    }

    // Tampilkan halaman admin login
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    // Proses admin login
    public function adminLogin(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial dan pastikan user adalah admin
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Cek apakah user adalah admin (email tertentu)
            if ($user->email === 'admin@kaynaabeauty.com') {
                $request->session()->regenerate();
                return redirect('/admin/dashboard')->with('success', 'Login admin berhasil!');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun ini bukan admin.',
                ])->onlyInput('email');
            }
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }

    // Admin logout
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Logout admin berhasil!');
    }
}
