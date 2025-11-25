<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'tokos';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
