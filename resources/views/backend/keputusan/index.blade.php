@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="/keputusan/add" class="btn btn-primary btn-sm">Tambah</a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong>1. Perhitungan Metode</strong>
                <table class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Terjual</th>
                    <th>Harga</th>
                    <th>Kategori (Laris/Tidak)</th>
                  </tr>
                  </thead>
                  @php
                  $no =1;
                  @endphp
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->terjual}}</td>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->kategori}}</td>
                            <td>
                                <a href="/keputusan/edit/{{$item->id}}" class="btn btn-xs bg-gradient-warning"><i class="fas fa-edit"></i></a>
                                <a href="/keputusan/delete/{{$item->id}}" class="btn btn-xs bg-gradient-danger" onclick="return confirm('Yakin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                             
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  
                </table>

                <br/>
                <br/>
                <strong>2. Klasifikasi Jenis</strong>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>Jenis</th>
                      <th>Jumlah Laris</th>
                      <th>Jumlah Tidak Laris</th>
                      <th>Jumlah Data</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kjenis as $item)
                        <tr>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->laris}}</td>
                            <td>{{$item->tidak}}</td>
                            <td>{{$item->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br/>
                <br/>
                <strong>3. Klasifikasi Harga</strong>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>Jenis</th>
                      <th>Jumlah Laris</th>
                      <th>Jumlah Tidak Laris</th>
                      <th>Jumlah Data</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kharga as $item)
                        <tr>
                            <td>{{$item->harga}}</td>
                            <td>{{$item->laris}}</td>
                            <td>{{$item->tidak}}</td>
                            <td>{{$item->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br/>
                <br/>
                <strong>4. Perhitungan Node</strong>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Jumlah Laris</th>
                        <th>Jumlah Tidak Laris</th>
                        <th>Entropy</th>
                        <th>Gain</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total</td>
                            <td>{{$total_perhitungan['total']}}</td>
                            <td>{{$total_perhitungan['laris']}}</td>
                            <td>{{$total_perhitungan['tidak']}}</td>
                            <td>{{$total_perhitungan['entropy']}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center text-bold">Jenis :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($gain_jenis,3)}}</td>
                        </tr>
                        
                        @foreach ($perhitungan_jenis as $key=> $item)
                            
                        <tr>
                            <td>{{$item['jenis']}}</td>
                            <td>{{$item['total']}}</td>
                            <td>{{$item['laris']}}</td>
                            <td>{{$item['tidak']}}</td>
                            <td>{{$item['entropy']}}</td>
                            <td></td>
                        </tr>
                        @endforeach

                        <tr>
                            <td class="text-center text-bold">Harga :</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{number_format($gain_harga,3)}}</td>
                        </tr>
                        
                        @foreach ($perhitungan_harga as $key=> $item)
                            
                        <tr>
                            <td>{{$item['harga']}}</td>
                            <td>{{$item['total']}}</td>
                            <td>{{$item['laris']}}</td>
                            <td>{{$item['tidak']}}</td>
                            <td>{{$item['entropy']}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection

@push('js')

<script src="/lte/plugins/datatables/jquery.dataTables.js"></script>
<script src="/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush
