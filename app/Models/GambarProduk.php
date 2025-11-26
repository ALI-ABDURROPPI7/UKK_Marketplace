<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    protected $table = 'gambar_produks';

    protected $fillable = [
        'products_id',
        'nama_gambar'
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
