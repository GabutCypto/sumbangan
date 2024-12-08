<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $guarded = [
        'id',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function sumbangan()
    {
        return $this->belongsTo(Sumbangan::class);
    }
}