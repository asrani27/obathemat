<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang_belanja';
    public $timestamps = false;

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}
