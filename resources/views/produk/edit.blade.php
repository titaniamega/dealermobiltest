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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('produk') ?'has-error' : '' }}">
                        <label for="exampleInputpProduk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="exampleInputProduk" placeholder="Nama Produk" name="nama_produk" value="{{ $produk->nama_produk }}">
                        @error('nama_produk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('produk') ?'has-error' : '' }}">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga mobil" name="harga" value="{{$produk->harga}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="gambarlama" value="{{ $produk->gambar }}" >
                            <img src="{{url('images/'.$produk->gambar)}}" width="200" class="img-fluid img-thumbnail"/>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="control-label">Ubah Gambar</label><br>
                            <input type="file" name="gambar">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="gambarslidelama" value="{{ $produk->gambarslide }}" >
                            <img src="{{url('slides/'.$produk->gambarslide)}}" width="200" class="img-fluid img-thumbnail"/> 
                        </div>
                        <div class="form-group">
                            <label for="gambarslide" class="control-label">Ubah Gambar</label><br>
                            <input type="file" name="gambarslide">
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="10" cols="30" value="{{$produk->deskripsi}}">{!! $produk->deskripsi !!}</textarea>
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
