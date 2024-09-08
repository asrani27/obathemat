<?php

use App\Obat;
use App\Jenis;
use App\Pembelian;
use App\Penjualan;

function jenis()
{
    return Jenis::get();
}

function obat()
{
    return Obat::get();
}

function stok()
{
    return Obat::sum('stok');
}

function penjualan()
{
    return Penjualan::get();
}
function pembelian()
{
    return Pembelian::get();
}
