@extends('adminlte::page')
@section('title', 'Tambah Data Berita')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Berita</h1>
@stop
@section('content')
    <form action="{{route('berita.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="exampleInputJudul">Judul Berita</label>
                        <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="exampleInputJudulBerita" placeholder="Judul Berita" name="judul_berita" value="{{old('judul_berita')}}">
                        @error('judul_berita') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputGambarBerita">Gambar Berita</label>
                        <input type="file" class="form-control @error('gambar_berita') is-invalid @enderror" id="exampleInputGambarBerita" placeholder="Gambar berita" name="gambar_berita">
                        @error('gambar_berita') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputKeterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="exampleInputKeterangan" rows="4" cols="30"></textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror   
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('berita.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
