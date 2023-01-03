@extends('adminlte::page')
@section('title', 'Edit Data Produk')
@section('content_header')
<script src='https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>
    <h1 class="m-0 text-dark">Edit Data Mobil</h1>
@stop
@section('content')
    <form action="{{route('produk.update',$produk->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputpProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="exampleInputProduk" placeholder="Nama Produk" name="nama_produk" value="{{ $produk->nama_produk }}">
                        @error('nama_produk') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputGambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" value="{{$produk->gambar}}" placeholder="Gambar produk" name="gambar">
                        <img src="{{url('images/'.$produk->gambar)}}" width="100" height="100" class="img-thumbnail"/> 
                        @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga mobil" name="harga" value="{{$produk->harga}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputGambarSlide">Gambar Slide</label>
                        <input type="file" class="form-control @error('gambarslide') is-invalid @enderror" value="{{$produk->gambarslide}}" placeholder="Gambar slide produk" name="gambarslide">
                        <img src="{{url('slides/'.$produk->gambarslide)}}" width="100" height="100" class="img-thumbnail"/> 
                        @error('gambarslide') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="10" cols="30" value="{{$produk->deskripsi}}">{!! $produk->deskripsi !!}</textarea>
                        <script>
                        CKEDITOR.replace('ckeditor');
                        </script>
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('produk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
