<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sumbangan extends Model
{
    //
    protected $guarded = [
        'id',
    ];

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}