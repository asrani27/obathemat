<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Keputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KeputusanController extends Controller
{
    public function index()
    {
        $data = Keputusan::orderBy('id', 'ASC')->get()->map(function ($item) {
            $u = $item;
            $u->nama = str_replace("\r", "", $item->nama);
            $u->jenis = str_replace("\r", "", $item->jenis);
            $u->terjual = str_replace("\r", "", $item->terjual);
            $u->harga = str_replace("\r", "", $item->harga);
            $u->kategori = str_replace("\r", "", $item->kategori);
            $u->save();

            return $item;
        });
        $kjenis = Keputusan::groupBy('jenis')->select('jenis')->get()->map(function ($item) {

            $item->total = Keputusan::where('jenis', $item->jenis)->count();
            $item->laris = Keputusan::where('jenis', $item->jenis)->where('kategori', 'L')->count();
            $item->tidak = Keputusan::where('jenis', $item->jenis)->where('kategori', 'TL')->count();
            return $item;
        })->sortByDesc('total');

        $kharga = Keputusan::groupBy('harga')->select('harga')->get()->map(function ($item) {

            $item->total = Keputusan::where('harga', $item->harga)->count();
            $item->laris = Keputusan::where('harga', $item->harga)->where('kategori', 'L')->count();
            $item->tidak = Keputusan::where('harga', $item->harga)->where('kategori', 'TL')->count();
            return $item;
        })->sortByDesc('total');

        $total_perhitungan['total'] = Keputusan::count();
        $total_perhitungan['laris'] = Keputusan::where('kategori', 'L')->count();
        $total_perhitungan['tidak'] = Keputusan::where('kategori', 'TL')->count();
        $total_perhitungan['entropy'] = number_format(((-$total_perhitungan['laris'] / $total_perhitungan['total']) * log($total_perhitungan['laris'] / $total_perhitungan['total'], 2)) + ((-$total_perhitungan['tidak'] / $total_perhitungan['total']) * log($total_perhitungan['tidak'] / $total_perhitungan['total'], 2)), 3);

        $perhitungan_jenis = $kjenis;
        $perhitungan_jenis = $kjenis->map(function ($item) use ($total_perhitungan) {
            if ($item->laris == 0 || $item->tidak == 0) {
                $item->entropy = 0;
            } else {
                $item->entropy = number_format(((-$item->laris / $item->total) * log($item->laris / $item->total, 2)) + ((-$item->tidak / $item->total) * log($item->tidak / $item->total, 2)), 3);
            }
            if ($item->entropy == 0) {
                $item->gain = 0;
            } else {
                $item->gain = ($item->total / $total_perhitungan['total']) * $item->entropy;
            }
            return $item;
        })->toArray();

        $perhitungan_harga = $kharga;
        $perhitungan_harga = $kharga->map(function ($item) use ($total_perhitungan) {
            if ($item->laris == 0 || $item->tidak == 0) {
                $item->entropy = 0;
            } else {
                $item->entropy = number_format(((-$item->laris / $item->total) * log($item->laris / $item->total, 2)) + ((-$item->tidak / $item->total) * log($item->tidak / $item->total, 2)), 3);
            }
            if ($item->entropy == 0) {
                $item->gain = 0;
            } else {
                $item->gain = ($item->total / $total_perhitungan['total']) * $item->entropy;
            }
            return $item;
        })->toArray();
        $gain_jenis = ($total_perhitungan['entropy']) - collect($perhitungan_jenis)->pluck('gain')->sum();
        $gain_harga = ($total_perhitungan['entropy']) - collect($perhitungan_harga)->pluck('gain')->sum();

        // dd($total_perhitungan, $perhitungan_jenis, $perhitungan_harga);
        return view('backend.keputusan.index', compact('data', 'kjenis', 'kharga', 'total_perhitungan', 'perhitungan_harga', 'perhitungan_jenis', 'gain_jenis', 'gain_harga'));
    }
    public function add()
    {
        return view('backend.keputusan.add');
    }

    public function save(Request $req)
    {
        $obat = Obat::find($req->nama);

        $s = new Keputusan();
        $s->nama = $obat->nama;
        $s->jenis = $obat->jenisobat->nama;
        $s->harga = $req->harga;
        $s->terjual = $req->terjual;
        $s->kategori = $req->kategori;
        $s->save();
        Alert::success('Data Berhasil Di Simpan', 'Info Message');
        return redirect('/keputusan');
    }

    public function edit($id)
    {
        $data = Keputusan::find($id);
        return view('backend.keputusan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $obat = Obat::find($req->nama);
        $s = Keputusan::find($id);
        $s->nama = $obat->nama;
        $s->jenis = $obat->jenisobat->nama;
        $s->harga = $req->harga;
        $s->terjual = $req->terjual;
        $s->kategori = $req->kategori;
        $s->save();
        Alert::success('Data Berhasil Di Update', 'Info Message');
        return redirect('/keputusan');
    }

    public function delete($id)
    {
        try {
            $delete = Keputusan::find($id)->delete();
            Alert::success('Data Berhasil Di Hapus', 'Info Message');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Tidak dapat di hapus karena terikat dengan data lain', 'Info Message');
            return back();
        }
    }
}
