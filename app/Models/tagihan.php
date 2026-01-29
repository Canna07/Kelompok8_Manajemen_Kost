<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'penghuni_id',
        'bulan',
        'jumlah',
        'status'
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}
