<?php

namespace App\Http\Controllers;

use Alert;
use App\Keranjang;
use App\Obat;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function add(Request $req)
    {
        $checkStok = Obat::find($req->obat_id)->stok;
        $checkKeranjang = Keranjang::where('obat_id', $req->obat_id)->where('type', $req->type)->first();
        if ($checkKeranjang == null) {

            $jumlah_jual = $req->jumlah;
        } else {

            $jumlah_jual = $checkKeranjang->jumlah + $req->jumlah;
        }

        if ($req->type == 'pembelian') {
            $check = Keranjang::where('obat_id', $req->obat_id)->where('type', $req->type)->first();
            if ($check == null) {
                $s = new Keranjang;
                $s->obat_id = $req->obat_id;
                $s->jumlah = $req->jumlah;
                $s->type = $req->type;
                $s->save();
            } else {
                $s = $check;
                $s->jumlah = $s->jumlah + $req->jumlah;
                $s->save();
            }
            return back();
        } else {
            if ($jumlah_jual > $checkStok) {
                Alert::info('Stok Tidak Cukup', 'Info Message');
                return back();
            } else {
                $check = Keranjang::where('obat_id', $req->obat_id)->where('type', $req->type)->first();
                if ($check == null) {
                    $s = new Keranjang;
                    $s->obat_id = $req->obat_id;
                    $s->jumlah = $req->jumlah;
                    $s->type = $req->type;
                    $s->save();
                } else {
                    $s = $check;
                    $s->jumlah = $s->jumlah + $req->jumlah;
                    $s->save();
                }
                return back();
            }
        }
    }

    public function delete($id)
    {
        $data = Keranjang::find($id)->delete();
        return back();
    }
}
