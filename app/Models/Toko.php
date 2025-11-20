<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //

    protected $table = 'tokos';
    protected $fillable = [
    'nama_toko',
    'alamat',
    'kontak',
    'deskripsi',
    'foto'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
