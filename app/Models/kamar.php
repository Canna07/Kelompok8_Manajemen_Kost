<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'nomor_kamar',
        'harga',
        'status'
    ];

    // RELASI: 1 KAMAR PUNYA 1 PENGHUNI
    public function penghuni()
    {
        return $this->hasOne(Penghuni::class);
    }
}
