@extends('adminlte::page')
@section('title', 'Edit Data Promo')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Promo</h1>
@stop
@section('content')
    <form action="{{route('promo.update',$promo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputNama">Produk</label>
                        <select class="form-control" name="id_produk" id="select_produk" required>
                            <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $model)
                            <option value="{{$model->id}}"> {{$model->nama_produk}} </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col">
                        <label for="exampleInputJudul">Judul Promo</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputJudul" placeholder="Judul Promo" name="judul" value="{{$promo->judul}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputGambarPromo">Gambar Promo</label>
                        <input type="hidden" name="gambarpromolama" value="{{$promo->gambar}}" >
                        <img src="{{url('images/promo/'.$promo->gambar)}}" width="100"/>
                        </div>
                        <div class="form-group">
                        <label for="gambar" class="control-label">Ubah Gambar</label><br>
                        <input type="file" name="gambar">
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('promo.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
