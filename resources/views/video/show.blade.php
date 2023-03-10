@extends('adminlte::page')
@section('title', 'Detail Video')
@section('content_header')
        <h1>Detail Video</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <h5>Tanggal : <span class="badge badge-pill badge-primary">{{ $registeredAt=$video->created_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                        <div class="col-md-6">
                        <h5>Diperbarui : <span class="badge badge-pill badge-primary">{{ $registeredAt=$video->updated_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered martop-sm">
                    <tr>
                        <td> ID Video </Video> </td> <td>{{$video->id}}</td>
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
                        <td> Status Aktif</td> <td>  {{$video->is_aktif}}</td>
                    </tr>
                    <table>
                </div>
                <div class="card-footer pt-3 border-top-0 bg-transparent">
                <a href="{{ route('video.edit', $video->id) }}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('video.index') }}" 
                    class="btn btn-default btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
