<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }


    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tokos()
{
    return $this->belongsTo(Toko::class);
}

    public function gambarProduk()
    {
        return $this->belongsTo(GambarProduk::class);
    }

}
