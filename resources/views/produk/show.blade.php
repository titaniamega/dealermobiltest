@extends('adminlte::page')
@section('title', 'Detail Mobil')
@section('content_header')
<div class="d-flex flex-row align-items-center my-flex-container">
  <div class="row">
    <div class="p-2 mr-auto my-flex-item">
    <h1 class="m-0 p-0 text-dark">Detail Mobil</h1>
    </div>
    <div class="p-2 mr-auto my-flex-item">
    <p class="m-0 p-0 fst-normal">Tanggal : {{ $registeredAt=$produk->created_at->isoFormat('dddd, D MMMM Y') }} </p>
    </div>
    <div class="p-2 mr-auto my-flex-item">
    <p class="m-0 p-0 fst-normal">Tanggal Diperbarui : {{ $registeredAt=$produk->updated_at->isoFormat('dddd, D MMMM Y') }}
    </div>
  </div>
</div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputName">Model</label>
                        <input type="text" name="merk_mobil" value="{{ $mobil->merk_mobil }}" class="form-control" readonly="readonly" placeholder="Merk Mobil">
                        @error('nama_produk') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputEmail">Tipe</label>
                        <input type="text" name="tipe_mobil" class="form-control" placeholder="Tipe Mobil" value="{{ $mobil->tipe_mobil}}" readonly="readonly">
                        @error('harga) <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" name="harga" value="{{$mobil->harga}}" class="form-control" placeholder="Harga Mobil" readonly="readonly">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <!-- <label for="exampleInputGambar">Gambar</label> -->
                        <img src="{{url('images/'.$mobil->gambar)}}" width="300"/> 
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
