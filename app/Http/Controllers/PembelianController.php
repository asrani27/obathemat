<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Bibit;
use App\Supplier;
use App\Keranjang;
use App\Obat;
use App\Pembelian;
use App\Penjualan;
use App\Pembelian_detail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianController extends Controller
{
    public function index()
    {
        $data = Pembelian::all();
        return view('backend.pembelian.index', compact('data'));
    }

    public function add()
    {
        $supplier = Supplier::all();
        $obat = Obat::all();
        $check = Pembelian::all();
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
        $keranjang = Keranjang::where('type', 'pembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->obat->harga_jual;
            return $item;
        });
        return view('backend.pembelian.add', compact('supplier', 'kode', 'obat', 'keranjang'));
    }

    public function save(Request $req)
    {
        $keranjang = Keranjang::where('type', 'pembelian')->get()->map(function ($item) {
            $item->subtotal = $item->jumlah * $item->obat->harga_jual;
            $item->harga = $item->obat->harga_jual;
            return $item;
        });
        if (count($keranjang) == 0) {
            Alert::warning('Keranjang Belanja Kosong, harap tambahkan', 'Info Message');
            return back();
        } else {

            $total     = $keranjang->sum('subtotal');
            $pembelian = new Pembelian;
            $pembelian->no_transaksi = $req->no_transaksi;
            $pembelian->created_at   = $req->created_at;
            $pembelian->supplier_id  = $req->supplier_id;
            $pembelian->total        = $total;
            $pembelian->save();

            foreach ($keranjang as $item) {
                $pj_detail = new Pembelian_detail;
                $pj_detail->obat_id      = $item->obat_id;
                $pj_detail->pembelian_id = $pembelian->id;
                $pj_detail->jumlah       = $item->jumlah;
                $pj_detail->harga        = $item->harga;
                $pj_detail->subtotal     = $item->subtotal;
                $pj_detail->save();

                $obat = Obat::find($item->obat_id);
                $obat->stok = $obat->stok + $item->jumlah;
                $obat->save();
            }

            foreach ($keranjang as $delete) {
                $del = $delete->delete();
            }
            Alert::success('Data Pembelian Berhasil Di Simpan', 'Info Message');
            return redirect('/pembelian');
        }
    }

    public function print($id)
    {
        $data = Pembelian::find($id);
        return view('backend.pembelian.print', compact('data'));
    }

    public function delete($id)
    {
        $data = Pembelian::find($id);
        $detail = $data->pembelian_detail;
        foreach ($detail as $item) {
            $obat = Obat::find($item->obat_id);
            $obat->stok = $obat->stok + $item->jumlah;
            $obat->save();

            $item->delete();
        }
        $data->delete();
        Alert::success('Data Pembelian Di Hapus Dan Stok Di Kembalikan', 'Info Message');
        return back();
    }
}
