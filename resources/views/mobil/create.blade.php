@extends('adminlte::page')
@section('title', 'Tambah Data Mobil')
@section('content_header')
<script src='https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>
    <h1 class="m-0 text-dark">Tambah Data Mobil</h1>
@stop
@section('content')
    <form action="{{route('mobil.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputName">Merk Mobil</label>
                        <input type="text" class="form-control @error('merk_mobil') is-invalid @enderror" id="exampleInputMerk" placeholder="Merk mobil" name="merk_mobil" value="{{old('merk_mobil')}}">
                        @error('merk_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail">Tipe Mobil</label>
                        <input type="text" class="form-control @error('tipe_mobil') is-invalid @enderror" id="exampleInputTipe" placeholder="Tipe mobil" name="tipe_mobil" value="{{old('tipe_mobil')}}">
                        @error('tipe_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga mobil" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputGambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="exampleInputGambar" placeholder="Gambar mobil" name="gambar">
                        @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="10" cols="30" value="{{old('deskripsi')}}"> </textarea>
                        <script>
                        CKEDITOR.replace('ckeditor');
                        </script>
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('mobil.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
