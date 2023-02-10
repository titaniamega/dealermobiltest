@extends('adminlte::page')
@section('title', 'Tambah Video')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Video</h1>
@stop
@section('content')

    <form action="{{route('video.store')}}" method="post">
        @csrf
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputProduk">Model</label>
                        <select class="form-control" name="id_produk" id="select_produk" required>
                            <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $model)
                            <option value="{{$model->id}}"> {{$model->nama_produk}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputJudulVideo">Judul Video</label>
                        <input type="text" class="form-control @error('judul_video') is-invalid @enderror" id="exampleInputJudulVideo" placeholder="Judul Video" name="judul_video" value="{{old('judul_video')}}">
                        @error('judul_video') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>    
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputLink">Link Video</label>
                        <input type="text" class="form-control @error('link_video') is-invalid @enderror" id="exampleInputLink" placeholder="Link Video" name="link_video" value="{{old('link_video')}}">
                        @error('link_video') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('video.index')}}" class="btn btn-warning">Batal</a>
            </div>
        </div>
    </div>
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
