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
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('konsumen') ? 'has-error' : '' }}">
                        <label for="exampleInputNama">Produk</label>
                        <select class="form-control" name="id_produk" id="select_produk" required focus>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $pro)
                            <option value="{{$pro->id}}" {{ $pro->id == $konsumen->id_produk ? 'selected' : ''}}>
                                {{ $pro->nama_produk }}
                            </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="exampleInputKonsumen">Nama Konsumen</label>
                        <input type="text" class="form-control @error('nama_konsumen') is-invalid @enderror" id="exampleInputKonsumen" placeholder="Nama Konsumen" name="nama_konsumen" value="{{$konsumen->nama_konsumen}}">
                        @error('nama_konsumen') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gambar" class="control-label">Ubah Foto</label><br>
                            <input type="file" name="gambar">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="gambarkonsumenlama" value="{{ $konsumen->gambar}}" >
                            <img src="{{url('images/konsumen/'.$konsumen->gambar)}}" width="100"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('konsumen.index')}}" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </div>
@stop
