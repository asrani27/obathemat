<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Bibit;
use App\Panen;
use App\Sawit;
use App\Tanam;
use App\Barang;
use App\Retail;
use App\Pekerja;
use App\Kustomer;
use App\Supplier;
use App\Pelanggan;
use App\Pembelian;
use App\Penjualan;
use App\Perawatan;
use App\Pengeluaran;
use App\Retur_pembelian;
use App\Retur_penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function printobat()
    {
        $data = Obat::all();
        return view('print.obat', compact('data'));
    }

    public function printstok()
    {
        $data = Obat::all();
        return view('print.stok', compact('data'));
    }

    public function printpenjualan()
    {
        $data = Penjualan::all();
        return view('print.penjualan', compact('data'));
    }

    public function bulanpenjualan()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $data = Penjualan::whereMonth('created_at', '=', $bulan)->whereYear('created_at', '=', $tahun)->get();
        return view('print.penjualan', compact('data'));
    }

    public function tahunpenjualan()
    {
        $tahun = request('tahun');
        $data = Penjualan::whereYear('created_at', '=', $tahun)->get();
        return view('print.penjualan', compact('data'));
    }
    public function bulanpembelian()
    {
        $bulan = request('bulan');
        $tahun = request('tahun');
        $data = Pembelian::whereMonth('created_at', '=', $bulan)->whereYear('created_at', '=', $tahun)->get();
        return view('print.pembelian', compact('data'));
    }

    public function tahunpembelian()
    {
        $tahun = request('tahun');
        $data = Pembelian::whereYear('created_at', '=', $tahun)->get();
        return view('print.pembelian', compact('data'));
    }
    public function printpembelian()
    {
        $data = Pembelian::all();
        return view('print.pembelian', compact('data'));
    }


    public function printcustomer()
    {
        $data = Kustomer::all();
        return view('print.customer', compact('data'));
    }

    public function printsupplier()
    {
        $data = Supplier::all();
        return view('print.supplier', compact('data'));
    }
}
