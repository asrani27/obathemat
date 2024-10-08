@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaksi Pembelian</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('pembelian')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">No. Transaksi</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" name="no_transaksi" value="TRSPB-{{$kode}}">
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" name="created_at" value="{{\Carbon\Carbon::now()}}">
                      </div>
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier</label>
                      <div class="col-sm-10">
                          <select name="supplier_id" class="form-control form-control-sm" required>
                              <option value="">-pilih-</option>
                              @foreach ($supplier as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option> 
                              @endforeach
                          </select>
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm float-right">Checkout <i class="fas fa-arrow-circle-right"></i></button>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="card card-outline card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('tambahkeranjang')}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">obat</label>
                      <div class="col-sm-9">
                          <select name="obat_id" class="form-control form-control-sm" required>
                              <option value="">-pilih-</option>
                              @foreach ($obat as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option> 
                              @endforeach
                          </select>
                      </div>
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" name="jumlah" value="1">
                      <input type="hidden" class="form-control form-control-sm" name="type" value="pembelian">
                      </div>
                      <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-block btn-primary btn-sm">+ keranjang</button>
                      </div>
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
               
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
          </div>
          <div class="col-8">
            <div class="card card-outline card-primary">
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode obat</th>
                    <th>Nama obat</th>
                    <th>Jumlah</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Subtotal</th>
                    <th>#</th>
                  </tr>
                  </thead>
                  @php
                  $no =1;
                  @endphp
                  <tbody>
                      @foreach ($keranjang as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->obat->kode}}</td>
                            <td>{{$item->obat->jenis}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->obat->stok + $item->jumlah}}</td>
                            <td>@currency($item->obat->harga_beli)</td>
                            <td>@currency($item->jumlah * $item->obat->harga_beli)</td>
                            <td>
                                <a href="/keranjang/delete/{{$item->id}}" class="btn btn-xs bg-gradient-danger" onclick="return confirm('Yakin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><b>Total</b></td>
                          <td>@currency($keranjang->sum('subtotal'))</td>
                      </tr>
                    
                  </tbody>
                  
                </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection

@push('js')
@endpush
