<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    public function jenisobat()
    {
        return $this->belongsTo(Jenis::class, 'jenis', 'id');
    }
}
