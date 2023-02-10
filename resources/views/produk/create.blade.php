@extends('adminlte::page')
@section('title', 'Tambah Data Mobil')
@section('content_header')
<script src='https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>
    <h1 class="m-0 text-dark">Tambah Data Mobil</h1>
@stop
@section('content')
    <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
        @csrf
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputpProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="exampleInputProduk" placeholder="Nama Produk" name="nama_produk" value="{{old('nama_produk')}}">
                        @error('nama_produk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga mobil" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                        <label for="exampleInputGambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputGambar" placeholder="Gambar mobil" name="gambar">
                        @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputGambarSlide">Gambar Slide</label>
                        <input type="file" class="form-control @error('gambarslide') is-invalid @enderror" id="exampleInputGambarSlide" placeholder="Gambar slide" name="gambarslide">
                        @error('gambarslide') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="10" cols="30" value="{{old('deskripsi')}}"> </textarea>
                        <script>
                        CKEDITOR.replace('ckeditor');
                        </script>
                    </div>
                </div>
            </div>
        </div>
            <div class="card-footer bg-transparent">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('produk.index')}}" class="btn btn-warning">Batal</a>
                </div>
            </div>
        </div>
    </div>
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
