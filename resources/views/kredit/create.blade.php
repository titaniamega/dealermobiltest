@extends('adminlte::page')
@section('title', 'Tambah Data Kredit')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Kredit</h1>
@stop
@section('content')
    <form action="{{route('kredit.store')}}" method="post">
        @csrf
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputProduk">Model</label>
                        <select class="form-control" name="id_produk" id="select_produk" required>
                            <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $model)
                            <option value="{{$model->id}}"> {{$model->nama_produk}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHargaMulai">Harga Mulai</label>
                        <input type="number" class="form-control @error('harga_mulai') is-invalid @enderror" id="exampleInputHargaMulai" placeholder="Harga mulai" name="harga_mulai" value="{{old('harga_mulai')}}">
                        @error('harga_mulai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputDpMulai">DP Mulai</label>
                        <input type="number" class="form-control @error('dp_mulai') is-invalid @enderror" id="exampleInputDpMulai" placeholder="DP Mulai" name="dp_mulai" value="{{old('dp_mulai')}}">
                        @error('dp_mulai') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    <div class="form-group">
                        <label for="exampleInputCicilanMulai">Cicilan Mulai</label>
                        <input type="number" class="form-control @error('cicilan_mulai') is-invalid @enderror" id="exampleInputCicilanMulai" placeholder="Cicilan Mulai" name="cicilan_mulai" value="{{old('cicilan_mulai')}}">
                        @error('cicilan_mulai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputTenor">Tenor</label>
                        <input type="number" class="form-control @error('tenor') is-invalid @enderror" id="exampleInputTenor" placeholder="Tenor" name="tenor" value="{{old('tenor')}}">
                        @error('tenor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('kredit.index')}}" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </div>
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
