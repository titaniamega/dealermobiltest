@extends('adminlte::page')
@section('title', 'Detail Tipe')
@section('content_header')
  <div class="row">
    <div class="col-sm">
    <h1 class="m-0 p-0 text-dark">Detail Tipe</h1>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal : {{ $registeredAt=$tipe->created_at->isoFormat('dddd, D MMMM Y') }} </p>
    </div>
    <div class="col-sm">
    <p class="m-0 p-0 fst-normal">Tanggal Diperbarui : {{ $registeredAt=$tipe->updated_at->isoFormat('dddd, D MMMM Y') }}
    </div>
    <div class="col-sm">
        <a href="{{route('tipe.index')}}" class="btn btn-outline-primary">
        Data Tipe
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
                        <td> ID Tipe </Video></td> <td>{{$tipe->id}}</td>
                    </tr>
                        <td> Nama Produk</td> <td>{{$tipe->id_produk}}</td>
                    </tr>
                    </tr>
                        <td> Tipe Produk</td> <td>{{$tipe->nama_tipe}}</td>
                    </tr>
                    </tr>
                        <td> Harga </td> <td>@currency($tipe->harga)</td>
                    </tr>
                    </tr>
                        <td> Harga Automatic </td> <td>@currency($tipe->harga_automatic)</td>
                    </tr>
                    <tr>
                        <td> Minimal Angsuran </td> <td>@currency($tipe->minimal_angsuran)</td>
                    </tr>
                    </tr>
                        <td> Bayar Pertama </td> <td>@currency($tipe->bayar_pertama)</td>
                    </tr>
                    <tr>
                        <td> Bonus </td> <td> {{$tipe->bonus}}</td>
                    </tr>
                    <table>
                </div>
                <div class="card-footer">
                <a href="{{ route('tipe.edit', $tipe->id) }}" 
                    class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('tipe.index') }}" 
                    class="btn btn-default btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@stop
