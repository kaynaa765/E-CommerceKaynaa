<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_order',
        'penerima',
        'no_hp',
        'alamat',
        'kota',
        'provinsi',
        'subtotal',
        'ongkir',
        'total',
        'status',
        'metode_pembayaran',
        'catatan',
    ];

    protected $casts = [
        'subtotal' => 'decimal:0',
        'ongkir' => 'decimal:0',
        'total' => 'decimal:0',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
