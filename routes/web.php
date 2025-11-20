<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Auth Routes
Route::get('/auth', function() {
    return view('auth.login-choice');
})->name('auth.choice');

Route::get('/loading', function() {
    return view('auth.loading');
})->name('auth.loading');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

// Cart routes (session-based)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout routes
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
Route::post('/order', [OrderController::class, 'create'])->name('order.create');
Route::get('/order/detail', [OrderController::class, 'detail'])->name('order.detail');

// Product detail route
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth'])->group(function () {
	Route::get('/siswa/dashboard', [ProductController::class, 'index'])->name('siswa.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/admin/siswa', [AdminController::class, 'siswa'])->name('admin.siswa');
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin.admin');

    // Stok routes
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    Route::get('/stok/create', [StokController::class, 'create'])->name('stok.create');
    Route::post('/stok', [StokController::class, 'store'])->name('stok.store');
    Route::get('/stok/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('/stok/{id}', [StokController::class, 'update'])->name('stok.update');
    Route::delete('/stok/{id}', [StokController::class, 'destroy'])->name('stok.destroy');

    // Pembelian routes
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/{id}', [PembelianController::class, 'show'])->name('pembelian.show');

    // Penjualan routes
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
});