<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::create([
            'user_id' => 1,
            'nomor_order' => 'ORD-20251101-001',
            'penerima' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123',
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
            'subtotal' => 250000,
            'ongkir' => 25000,
            'total' => 275000,
            'status' => 'selesai',
            'metode_pembayaran' => 'transfer_bank',
        ]);

        \App\Models\Order::create([
            'user_id' => 1,
            'nomor_order' => 'ORD-20251102-002',
            'penerima' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123',
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
            'subtotal' => 180000,
            'ongkir' => 20000,
            'total' => 200000,
            'status' => 'dikirim',
            'metode_pembayaran' => 'e_wallet',
            'catatan' => 'Segera sampai',
        ]);

        \App\Models\Order::create([
            'user_id' => 1,
            'nomor_order' => 'ORD-20251103-003',
            'penerima' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123',
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
            'subtotal' => 420000,
            'ongkir' => 30000,
            'total' => 450000,
            'status' => 'diproses',
            'metode_pembayaran' => 'transfer_bank',
        ]);

        \App\Models\Order::create([
            'user_id' => 1,
            'nomor_order' => 'ORD-20251104-004',
            'penerima' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123',
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
            'subtotal' => 150000,
            'ongkir' => 15000,
            'total' => 165000,
            'status' => 'pending',
            'metode_pembayaran' => 'cod',
        ]);

        \App\Models\Order::create([
            'user_id' => 1,
            'nomor_order' => 'ORD-20251105-005',
            'penerima' => 'Budi Santoso',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123',
            'kota' => 'Jakarta',
            'provinsi' => 'DKI Jakarta',
            'subtotal' => 320000,
            'ongkir' => 25000,
            'total' => 345000,
            'status' => 'selesai',
            'metode_pembayaran' => 'transfer_bank',
        ]);
    }
}
