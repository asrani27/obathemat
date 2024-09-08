<?php

namespace App\Http\Controllers;

use Alert;
use App\Barang;
use App\Bibit;
use App\Retail;
use App\Kustomer;
use App\Keranjang;
use App\Obat;
use App\Pelanggan;
use App\Penjualan;
use App\Penjualan_detail;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $data = Penjualan::all();
        return view('backend.penjualan.index', compact('data'));
    }

    public function add()
    {
        $pelanggan = Pelanggan::all();
        $obat = Obat::all();
        $check = Penjualan::all();
        if (count($check) == 0) {
            $kode = '0001';
        } else {
            $number = count($check) + 1;
            if (strlen($number) == 1) {
                $kode = '000' . $number;
            } elseif (strlen($number) == 2) {
                $kode = '00' . $number;
            } elseif (strlen($number) == 3) {
                $kode = '0' . $number;
            } elseif (strlen($number) == 4) {
                $kode = $number;
            }
        }
        $keranjang = Keranjang::where('type', 'penjualan')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->obat->harga_jual;
            return $item;
        });
        return view('backend.penjualan.add', compact('pelanggan', 'kode', 'obat', 'keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type', 'penjualan')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->obat->harga_jual;
            $item->harga = $item->obat->harga_jual;
            return $item;
        });
        if (count($keranjang) == 0) {
            Alert::warning('Keranjang Belanja Kosong, harap tambahkan', 'Info Message');
            return back();
        } else {
            $total     = $keranjang->sum('subtotal');
            $penjualan = new Penjualan;
            $penjualan->no_transaksi = $req->no_transaksi;
            $penjualan->created_at   = $req->created_at;
            $penjualan->kustomer     = $req->kustomer;
            $penjualan->total        = $total;
            $penjualan->save();

            foreach ($keranjang as $item) {
                $pj_detail = new Penjualan_detail;
                $pj_detail->obat_id      = $item->obat_id;
                $pj_detail->penjualan_id = $penjualan->id;
                $pj_detail->jumlah       = $item->jumlah;
                $pj_detail->harga        = $item->harga;
                $pj_detail->subtotal     = $item->subtotal;
                $pj_detail->save();

                $obat = Obat::find($item->obat_id);
                $obat->stok = $obat->stok - $item->jumlah;
                $obat->save();
            }

            foreach ($keranjang as $delete) {
                $del = $delete->delete();
            }
            Alert::success('Data Penjualan Berhasil Di Simpan', 'Info Message');
            return redirect('/penjualan');
        }
    }

    public function print($id)
    {
        $data = Penjualan::find($id);
        return view('backend.penjualan.print', compact('data'));
    }

    public function delete($id)
    {
        $data = Penjualan::find($id);
        $detail = $data->penjualan_detail;
        foreach ($detail as $item) {
            $obat = Obat::find($item->obat_id);
            $obat->stok = $obat->stok + $item->jumlah;
            $obat->save();

            $item->delete();
        }
        $data->delete();
        Alert::success('Data Penjualan Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}
