@extends('adminlte::page')
@section('title', 'Tambah Data Promo')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Promo</h1>
@stop
@section('content')
    <form action="{{route('promo.store')}}" method="post" enctype="multipart/form-data">
        @csrf
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
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputJudul" placeholder="Judul Promo" name="judul" value="{{old('judul')}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputGambarPromo">Promo</label>
                        <input type="file" class="form-control @error('promo') is-invalid @enderror" id="exampleInputGambarPromo" placeholder="Gambar promo" name="gambar">
                        @error('promo') <span class="text-danger">{{$message}}</span> @enderror
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
