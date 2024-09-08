<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ObatController extends Controller
{
    public function index()
    {
        $data = Obat::all();
        return view('backend.obat.index', compact('data'));
    }

    public function add()
    {
        $check = Obat::all();
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

        return view('backend.obat.add', compact('kode'));
    }

    public function save(Request $req)
    {
        $s = new Obat;
        $s->kode = $req->kode;
        $s->jenis = $req->jenis;
        $s->nama = $req->nama;
        $s->harga_beli = str_replace('.', '', $req->harga_beli);
        $s->harga_jual = str_replace('.', '', $req->harga_jual);
        $s->stok = $req->stok;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/obat');
    }

    public function edit($id)
    {
        $data = Obat::find($id);
        return view('backend.obat.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $s = Obat::find($id);
        $s->jenis = $req->jenis;
        $s->nama = $req->nama;
        $s->harga_beli = str_replace('.', '', $req->harga_beli);
        $s->harga_jual = str_replace('.', '', $req->harga_jual);
        $s->stok = $req->stok;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/obat');
    }

    public function delete($id)
    {
        try {
            Obat::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {

            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}
