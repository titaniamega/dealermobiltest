@extends('adminlte::page')
@section('title', 'Detail Data Mobil')
@section('content_header')
    <h1 class="m-0 text-dark">Detail Data Mobil</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputName">Merk Mobil</label>
                        <input type="text" name="merk_mobil" value="{{ $mobil->merk_mobil }}" class="form-control" readonly="readonly" placeholder="Edit Merk Mobil">
                        @error('merk_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail">Tipe Mobil</label>
                        <input type="text" name="tipe_mobil" class="form-control" placeholder="Edit Tipe Mobil" value="{{ $mobil->tipe_mobil}}" readonly="readonly">
                        @error('tipe_mobil') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" name="harga" value="{{ $mobil->harga }}" class="form-control" placeholder="Edit Harga Mobil" readonly="readonly">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputGambar">Gambar</label>
                        <img src="{{url('images/'.$mobil->gambar)}}" width="100" height="100"/> 
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputDeskripsi">Deskripsi</label>
                        {!! $mobil->deskripsi !!}
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@stop
