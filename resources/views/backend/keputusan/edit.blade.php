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
            <h1 class="m-0 text-dark">Edit </h1>
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
                <form class="form-horizontal" method="POST" action="{{route('editkeputusan',['id' => $data->id])}}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Obat</label>
                      <div class="col-sm-10">
                          <select name="nama" class="form-control" required>
                            <option value=""></option>
                            @foreach (obat() as $item)
                                <option value="{{$item->id}}" {{$data->nama == $item->nama ? 'selected':''}}>{{$item->nama}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Terjual</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="terjual" value="{{$data->terjual}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                          <select name="harga" class="form-control" required>
                            <option value=""></option>
                                <option value="Murah" {{$data->harga == 'Murah' ? 'selected':''}}>Murah</option>
                                <option value="Normal" {{$data->harga == 'Normal' ? 'selected':''}}>Normal</option>
                                <option value="Mahal" {{$data->harga == 'Mahal' ? 'selected':''}}>Mahal</option>
                            </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                      <div class="col-sm-10">
                          <select name="kategori" class="form-control" required>
                            <option value=""></option>
                                <option value="L" {{$data->kategori == 'L' ? 'selected':''}}>Laris</option>
                                <option value="TL" {{$data->kategori == 'T' ? 'selected':''}}>Tidak Laris</option>
                            </select>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="icon fas fa-check"></i>
                        Update</button>
                    <a href="/jenis" class="btn btn-default float-right">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
    
</div>
@endsection

@push('js')
@endpush
