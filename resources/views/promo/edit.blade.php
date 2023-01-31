@extends('adminlte::page')
@section('title', 'Edit Data Promo')
@section('content_header')
<script src='https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js'></script>
    <h1 class="m-0 text-dark">Edit Data Promo</h1>
@stop
@section('content')
    <form action="{{route('promo.update',$promo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('promo') ? 'has-error' : '' }}">
                        <label for="exampleInputNama">Produk</label>
                        <select class="form-control" name="id_produk" id="select_produk" required focus>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $pro)
                            <option value="{{$pro->id}}" {{ $pro->id == $promo->id_produk ? 'selected' : ''}}>
                                {{ $pro->nama_produk }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('promo') ? 'has-error' : '' }}">
                        <label for="exampleInputJudul">Judul Promo</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputJudul" placeholder="Judul Promo" name="judul" value="{{$promo->judul}}">
                        @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('promo') ? 'has-error' : '' }}">
                    <label for="date">Tanggal Berlaku</label>
                    <input type="date" class="form-control" id="date" name="masa_berlaku" placeholder="Masa Berlaku" value="{{$promo->masa_berlaku}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gambar" class="control-label">Ubah Gambar</label><br>
                        <input type="file" name="gambar">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="gambarpromolama" value="{{$promo->gambar}}" >
                        <img src="{{url('images/promo/'.$promo->gambar)}}" width="100"/>
                    </div>
                </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputKeterangan">Keterangan</label>
                        <textarea class="ckeditor form-control" name="keterangan" id="keterangan" rows="10" cols="30" value="{{$promo->keterangan}}">{!! $promo->keterangan !!}</textarea>
                        <script>
                        CKEDITOR.replace('ckeditor');
                        </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('promo.index')}}" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </div>
@stop
