@extends('adminlte::page')
@section('title', 'Edit Data Mobil')
@section('content_header')
<script src='https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>
    <h1 class="m-0 text-dark">Edit Data Mobil</h1>
@stop
@section('content')
<form action="{{route('mobil.update',$mobil->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputName">Merk Mobil</label>
                        <input type="text" name="merk_mobil" value="{{ $mobil->merk_mobil }}" class="form-control" placeholder="Edit Merk Mobil">
                        @error('merk_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail">Tipe Mobil</label>
                        <input type="text" name="tipe_mobil" class="form-control" placeholder="Edit Tipe Mobil" value="{{ $mobil->tipe_mobil}}">
                        @error('tipe_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" name="harga" value="{{ $mobil->harga }}" class="form-control" placeholder="Edit Harga Mobil">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputGambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" value="{{$mobil->gambar}}" placeholder="Gambar mobil" name="gambar">
                        <img src="{{url('images/'.$mobil->gambar)}}" width="100" height="100" class="img-thumbnail"/> 
                        @error('gambar') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        <textarea class="ckeditor form-control" name="deskripsi" id="deskripsi" rows="10" cols="30" value="{{$mobil->deskripsi}}">{!! $mobil->deskripsi !!}</textarea>
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
