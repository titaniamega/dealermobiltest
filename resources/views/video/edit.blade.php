@extends('adminlte::page')
@section('title', 'Edit Video')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Video</h1>
@stop
@section('content')
    <form action="{{route('video.update',$video->id)}}" method="post">
        @csrf
        @method('PUT')
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                        <label for="exampleInputProduk">Model</label>
                        <select class="form-control" name="id_produk" id="select_produk" required focus>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $pro)
                            <option value="{{$pro->id}}" {{ $pro->id == $video->id_produk ? 'selected' : ''}}>
                                {{ $pro->nama_produk }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputJudulVideo">Judul Video</label>
                        <input type="text" class="form-control @error('judul_video') is-invalid @enderror" id="exampleInputJudulVideo" placeholder="Judul Video" name="judul_video" value="{{$video->judul_video}}">
                        @error('judul_video') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputLink">Link Video</label>
                        <input type="text" class="form-control @error('link_video') is-invalid @enderror" id="exampleInputLink" placeholder="Link Video" name="link_video" value="{{$video->link_video}}">
                        @error('link_video') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('video.index')}}" class="btn btn-warning">Batal</a>
                </div> 
                </div>
            </div>
        </div>
        </div>
    </div>
@stop
