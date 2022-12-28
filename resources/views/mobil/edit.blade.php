@extends('adminlte::page')
@section('title', 'Tambah Edit Data Mobil')
@section('content_header')
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
                        <label for="exampleInputName">Edit Merk Mobil</label>
                        <input type="text" name="merk_mobil" value="{{ $mobil->merk_mobil }}" class="form-control" placeholder="Edit Merk Mobil">
                        @error('merk_mobil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Edit Tipe Mobil</label>
                        <input type="text" name="tipe_mobil" class="form-control" placeholder="Edit Tipe Mobil" value="{{ $mobil->tipe_mobil}}">
                        @error('tipe_mobil') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHarga">Edit Harga</label>
                        <input type="number" name="harga" value="{{ $mobil->harga }}" class="form-control" placeholder="Edit Harga Mobil">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
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