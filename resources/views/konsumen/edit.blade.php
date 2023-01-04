@extends('adminlte::page')
@section('title', 'Edit Data Konsumen')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Kosumen</h1>
@stop
@section('content')
    <form action="{{route('konsumen.update',$konsumen->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                        <label for="exampleInputKonsumen">Nama Konsumen</label>
                        <input type="text" class="form-control @error('nama_konsumen') is-invalid @enderror" id="exampleInputKonsumen" placeholder="Nama Konsumen" name="nama_konsumen" value="{{$konsumen->nama_konsumen}}">
                        @error('nama_konsumen') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputGambarKonsumen">Gambar Konsumen</label>
                        <input type="hidden" name="gambarkonsumenlama" value="{{ $konsumen->gambar}}" >
                        <img src="{{url('images/konsumen/'.$konsumen->gambar)}}" width="100"/>
                        </div>
                        <div class="form-group">
                        <label for="gambar" class="control-label">Ubah Gambar</label><br>
                        <input type="file" name="gambar">
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('konsumen.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
