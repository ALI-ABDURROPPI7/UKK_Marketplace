<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'nama',
        'harga',
        'kategori_id',
        'toko_id',
        'user_id',
        'tanggal_upload',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function toko(){
        return $this->belongsTo(Toko::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

public function gambarProduk()
{
    return $this->hasMany(GambarProduk::class, 'products_id');
}


}
