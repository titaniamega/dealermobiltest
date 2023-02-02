@extends('adminlte::page')
@section('title', 'Detail Berita')
@section('content_header')
    <h1>Detail Berita</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                <h5>Tanggal : <span class="badge badge-pill badge-primary">{{ $registeredAt=$berita->created_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                                </div>
                                <div class="col-md-6 mb-2">
                                <h5>Diperbarui : <span class="badge badge-pill badge-primary">{{ $registeredAt=$berita->updated_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                                </div>
                            </div>
                        </div>
                <table class="table table-striped table-bordered martop-sm">
                    <tr>
                        <td> ID Berita</td> <td>{{$berita->id}}</td>
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
    <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
