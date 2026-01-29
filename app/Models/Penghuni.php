<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $fillable = ['nama','no_hp','kamar_id'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function tagihans()
{
    return $this->hasMany(Tagihan::class);
}

}
