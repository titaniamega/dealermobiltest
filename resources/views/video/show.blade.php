@extends('adminlte::page')
@section('title', 'Detail Video')
@section('content_header')
  <div class="row">
    <div class="col-sm">
    <h1 class="m-0 p-0 text-dark">Detail Video</h1>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal : {{ $registeredAt=$video->created_at->isoFormat('dddd, D MMMM Y') }} </p>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal Diperbarui : {{ $registeredAt=$video->updated_at->isoFormat('dddd, D MMMM Y') }}
    </div>
    <div class="col-sm">
        <a href="{{route('video.index')}}" class="btn btn-outline-primary">
        Data Video
        </a>
    </div>
  </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <table class="table table-striped table-bordered martop-sm">
                    <tr>
                        <td> ID Video </Video></td> <td>{{$video->id}}</td>
                    </tr>
                        <td> Judul Video </td> <td>{{$video->judul_video}}</td>
                    </tr>
                    </tr>
                        <td> Gambar </td> <td><img src="{{"https://i.ytimg.com/vi/".preg_replace('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})/m', '$1', $video->link_video)."/hqdefault.jpg" }}" width="200"/></td>
                    </tr>
                    <tr>
                        <td> Link Video </td> <td> {{$video->link_video}}</td>
                    </tr>
                    <tr>
                        <td> Status </td> <td> </td>
                    </tr>
                    <table>
                </div>
                <div class="card-footer">
                <a href="{{ route('video.edit', $video->id) }}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('video.index') }}" 
                    class="btn btn-default btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@stop
