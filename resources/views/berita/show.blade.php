@extends('adminlte::page')
@section('title', 'Detail Berita')
@section('content_header')
  <div class="row">
    <div class="col-sm">
    <h1 class="m-0 p-0 text-dark">Detail Berita</h1>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal : {{ $registeredAt=$berita->created_at->isoFormat('dddd, D MMMM Y') }} </p>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal Diperbarui : {{ $registeredAt=$berita->updated_at->isoFormat('dddd, D MMMM Y') }}
    </div>
    <div class="col-sm">
        <a href="{{route('berita.index')}}" class="btn btn-outline-primary">
        Data Berita
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
                        <td> ID Berita</td> <td>{{$berita->id}}</td>
                    </tr>
                    <tr>
                        @php
                        $produk=\App\models\Produk::all();
                        @endphp
                        <td> Nama Produk </td> <td>{{$berita->id_produk}}</td>
                    </tr>
                    <tr>
                        <td> Judul Berita </td> <td>{{$berita->judul_berita}}</td>
                    </tr>
                    <tr>
                        <td> Gambar </td> <td> <img src="{{url('/images/berita/'.$berita->gambar_berita)}}" width="150"> </td>
                    </tr>
                    <tr>
                        <td> Keterangan </td> <td>{{$berita->keterangan}}</td>
                    </tr>
                    <table>
                </div>
                <div class="card-footer">
                <a href="{{ route('berita.edit', $berita->id) }}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('berita.index') }}" 
                    class="btn btn-default btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@stop
