<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'stok',
        'terjual',
        'rating',
        'foto',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:0',
        'rating' => 'float',
    ];
}
