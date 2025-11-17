<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //

    protected $table = 'toko';
    protected $fillable = ['nama_toko', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
