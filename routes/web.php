<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', 'LoginController@logout');
Route::get('/', 'LoginController@loginhome');
Route::post('/login', 'LoginController@login');
Route::get('/login', 'LoginController@loginhome')->name('login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/keputusan', 'KeputusanController@index');
    Route::get('/keputusan/add', 'KeputusanController@add');
    Route::get('/keputusan/edit/{id}', 'KeputusanController@edit');
    Route::get('/keputusan/delete/{id}', 'KeputusanController@delete');
    Route::post('/keputusan/add', 'KeputusanController@save')->name('keputusan');
    Route::post('/keputusan/edit/{id}', 'KeputusanController@update')->name('editkeputusan');

    Route::get('/pelanggan', 'PelangganController@index');
    Route::get('/pelanggan/add', 'PelangganController@add');
    Route::get('/pelanggan/edit/{id}', 'PelangganController@edit');
    Route::get('/pelanggan/delete/{id}', 'PelangganController@delete');
    Route::post('/pelanggan/add', 'PelangganController@save')->name('pelanggan');
    Route::post('/pelanggan/edit/{id}', 'PelangganController@update')->name('editpelanggan');

    Route::get('/lahan', 'LahanController@index');
    Route::get('/lahan/add', 'LahanController@add');
    Route::get('/lahan/edit/{id}', 'LahanController@edit');
    Route::get('/lahan/delete/{id}', 'LahanController@delete');
    Route::post('/lahan/add', 'LahanController@save')->name('lahan');
    Route::post('/lahan/edit/{id}', 'LahanController@update')->name('editlahan');

    Route::get('/pekerja', 'PekerjaController@index');
    Route::get('/pekerja/add', 'PekerjaController@add');
    Route::get('/pekerja/edit/{id}', 'PekerjaController@edit');
    Route::get('/pekerja/delete/{id}', 'PekerjaController@delete');
    Route::post('/pekerja/add', 'PekerjaController@save')->name('pekerja');
    Route::post('/pekerja/edit/{id}', 'PekerjaController@update')->name('editpekerja');

    Route::get('/obat', 'ObatController@index');
    Route::get('/obat/add', 'ObatController@add');
    Route::get('/obat/edit/{id}', 'ObatController@edit');
    Route::get('/obat/delete/{id}', 'ObatController@delete');
    Route::post('/obat/add', 'ObatController@save')->name('obat');
    Route::post('/obat/edit/{id}', 'ObatController@update')->name('editobat');

    Route::get('/tanam', 'TanamController@index');
    Route::get('/tanam/add', 'TanamController@add');
    Route::get('/tanam/edit/{id}', 'TanamController@edit');
    Route::get('/tanam/delete/{id}', 'TanamController@delete');
    Route::post('/tanam/add', 'TanamController@save')->name('tanam');
    Route::post('/tanam/edit/{id}', 'TanamController@update')->name('edittanam');

    Route::get('/perawatan', 'PerawatanController@index');
    Route::get('/perawatan/add', 'PerawatanController@add');
    Route::get('/perawatan/edit/{id}', 'PerawatanController@edit');
    Route::get('/perawatan/delete/{id}', 'PerawatanController@delete');
    Route::post('/perawatan/add', 'PerawatanController@save')->name('perawatan');
    Route::post('/perawatan/edit/{id}', 'PerawatanController@update')->name('editperawatan');

    Route::get('/panen', 'PanenController@index');
    Route::get('/panen/add', 'PanenController@add');
    Route::get('/panen/edit/{id}', 'PanenController@edit');
    Route::get('/panen/delete/{id}', 'PanenController@delete');
    Route::post('/panen/add', 'PanenController@save')->name('panen');
    Route::post('/panen/edit/{id}', 'PanenController@update')->name('editpanen');


    Route::get('/sawit', 'SawitController@index');
    Route::get('/sawit/add', 'SawitController@add');
    Route::get('/sawit/edit/{id}', 'SawitController@edit');
    Route::get('/sawit/delete/{id}', 'SawitController@delete');
    Route::post('/sawit/add', 'SawitController@save')->name('sawit');
    Route::post('/sawit/edit/{id}', 'SawitController@update')->name('editsawit');

    Route::get('/satuan', 'SatuanController@index');
    Route::get('/satuan/add', 'SatuanController@add');
    Route::get('/satuan/edit/{id}', 'SatuanController@edit');
    Route::get('/satuan/delete/{id}', 'SatuanController@delete');
    Route::post('/satuan/add', 'SatuanController@save')->name('satuan');
    Route::post('/satuan/edit/{id}', 'SatuanController@update')->name('editsatuan');


    Route::get('/jenis', 'JenisController@index');
    Route::get('/jenis/add', 'JenisController@add');
    Route::get('/jenis/edit/{id}', 'JenisController@edit');
    Route::get('/jenis/delete/{id}', 'JenisController@delete');
    Route::post('/jenis/add', 'JenisController@save')->name('jenis');
    Route::post('/jenis/edit/{id}', 'JenisController@update')->name('editjenis');

    Route::get('/pengeluaran', 'PengeluaranController@index');
    Route::get('/pengeluaran/add', 'PengeluaranController@add');
    Route::get('/pengeluaran/edit/{id}', 'PengeluaranController@edit');
    Route::get('/pengeluaran/delete/{id}', 'PengeluaranController@delete');
    Route::post('/pengeluaran/add', 'PengeluaranController@save')->name('pengeluaran');
    Route::post('/pengeluaran/edit/{id}', 'PengeluaranController@update')->name('editpengeluaran');

    Route::get('/supplier', 'SupplierController@index');
    Route::get('/supplier/add', 'SupplierController@add');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit');
    Route::get('/supplier/delete/{id}', 'SupplierController@delete');
    Route::post('/supplier/add', 'SupplierController@save')->name('supplier');
    Route::post('/supplier/edit/{id}', 'SupplierController@update')->name('editsupplier');


    Route::get('/user', 'UserController@index');
    Route::get('/user/add', 'UserController@add');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::get('/user/delete/{id}', 'UserController@delete');
    Route::post('/user/add', 'UserController@save')->name('user');
    Route::post('/user/edit/{id}', 'UserController@update')->name('edituser');

    Route::get('/penjualan', 'PenjualanController@index');
    Route::get('/penjualan/add', 'PenjualanController@add');
    Route::get('/penjualan/edit/{id}', 'PenjualanController@edit');
    Route::get('/penjualan/delete/{id}', 'PenjualanController@delete');
    Route::post('/penjualan/add', 'PenjualanController@save')->name('penjualan');
    Route::post('/penjualan/edit/{id}', 'PenjualanController@update')->name('editpenjualan');
    Route::get('/penjualan/print/{id}', 'PenjualanController@print');


    Route::post('/keranjang/tambah', 'KeranjangController@add')->name('tambahkeranjang');
    Route::get('/keranjang/delete/{id}', 'KeranjangController@delete');


    Route::get('/pembelian', 'PembelianController@index');
    Route::get('/pembelian/add', 'PembelianController@add');
    Route::get('/pembelian/edit/{id}', 'PembelianController@edit');
    Route::get('/pembelian/delete/{id}', 'PembelianController@delete');
    Route::post('/pembelian/add', 'PembelianController@save')->name('pembelian');
    Route::post('/pembelian/edit/{id}', 'PembelianController@update')->name('editpembelian');
    Route::get('/pembelian/print/{id}', 'PembelianController@print');

    Route::get('/retur_penjualan', 'ReturPenjualanController@index');
    Route::get('/retur_penjualan/add', 'ReturPenjualanController@add');
    Route::get('/retur_penjualan/edit/{id}', 'ReturPenjualanController@edit');
    Route::get('/retur_penjualan/delete/{id}', 'ReturPenjualanController@delete');
    Route::post('/retur_penjualan/add', 'ReturPenjualanController@save')->name('returpenjualan');
    Route::post('/retur_penjualan/edit/{id}', 'ReturPenjualanController@update')->name('editreturpenjualan');

    Route::get('/retur_pembelian', 'ReturPembelianController@index');
    Route::get('/retur_pembelian/add', 'ReturPembelianController@add');
    Route::get('/retur_pembelian/edit/{id}', 'ReturPembelianController@edit');
    Route::get('/retur_pembelian/delete/{id}', 'ReturPembelianController@delete');
    Route::post('/retur_pembelian/add', 'ReturPembelianController@save')->name('returpembelian');
    Route::post('/retur_pembelian/edit/{id}', 'ReturPembelianController@update')->name('editreturpembelian');

    Route::get('/laporan/index', 'LaporanController@index');
    Route::get('/laporan/stok', 'LaporanController@stok');
    Route::get('/laporan/penjualan', 'LaporanController@penjualan');
    Route::get('/laporan/pembelian', 'LaporanController@pembelian');
    Route::get('/laporan/returpenjualan', 'LaporanController@returpenjualan');
    Route::get('/laporan/returpembelian', 'LaporanController@returpembelian');

    Route::get('/laporan/obat/print', 'LaporanController@printobat');
    Route::get('/laporan/stok/print', 'LaporanController@printstok');
    Route::get('/laporan/stok/bibit', 'LaporanController@stokbibit');
    Route::get('/laporan/stok/sawit', 'LaporanController@stoksawit');
    Route::get('/laporan/penjualan/print', 'LaporanController@printpenjualan');
    Route::get('/laporan/pembelian/print', 'LaporanController@printpembelian');

    Route::post('laporan/penjualan/bulan', 'LaporanController@bulanpenjualan');
    Route::post('laporan/penjualan/tahun', 'LaporanController@tahunpenjualan');

    Route::get('/laporan/pekerja', 'LaporanController@pekerja');
    Route::get('/laporan/tanam', 'LaporanController@tanam');
    Route::get('/laporan/panen', 'LaporanController@panen');
    Route::get('/laporan/perawatan', 'LaporanController@perawatan');


    Route::get('/laporan/pekerja/print', 'LaporanController@pekerjaprint');
    Route::get('/laporan/tanam/print', 'LaporanController@tanamprint');
    Route::get('/laporan/panen/print', 'LaporanController@panenprint');
    Route::get('/laporan/perawatan/print', 'LaporanController@perawatanprint');

    Route::post('laporan/pembelian/bulan', 'LaporanController@bulanpembelian');
    Route::post('laporan/pembelian/tahun', 'LaporanController@tahunpembelian');
    Route::get('/laporan/returpenjualan/print', 'LaporanController@printreturpenjualan');
    Route::get('/laporan/returpembelian/print', 'LaporanController@printreturpembelian');
    Route::get('/laporan/laba', 'LaporanController@laba');
    Route::get('/laporan/laba/tampilkan', 'LaporanController@tampilkanlaba');
    Route::get('/laporan/customer', 'LaporanController@customer');
    Route::get('/laporan/supplier', 'LaporanController@supplier');
    Route::get('/laporan/retail', 'LaporanController@retail');
    Route::get('/laporan/pelanggan', 'LaporanController@pelanggan');
    Route::get('/laporan/pengeluaran', 'LaporanController@pengeluaran');
    Route::get('/laporan/pengeluaran/print', 'LaporanController@printpengeluaran');

    Route::get('/laporan/customer/print', 'LaporanController@printcustomer');
    Route::get('/laporan/supplier/print', 'LaporanController@printsupplier');
    Route::get('/laporan/retail/print', 'LaporanController@printretail');
    Route::get('/laporan/pelanggan/print', 'LaporanController@printpelanggan');
});
