@extends('adminlte::page')
@section('title', 'Detail Tipe')
@section('content_header')
    <h1>Detail Tipe</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <h5>Tanggal : <span class="badge badge-pill badge-primary">{{ $registeredAt=$tipe->created_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                        <div class="col-md-6">
                        <h5>Diperbarui : <span class="badge badge-pill badge-primary">{{ $registeredAt=$tipe->updated_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered martop-sm">
                    <tr>
                        <td> ID Tipe </Video></td> <td>{{$tipe->id}}</td>
                    </tr>
                    <tr>
                        @foreach($tipeProduk as $tp)
                        <td> Nama Produk</td> <td>{{$tp->nama_produk}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td> Tipe Produk</td> <td>{{$tipe->nama_tipe}}</td>
                    </tr>
                    <tr>
                        <td> Harga </td> <td>@currency($tipe->harga)</td>
                    </tr>
                    <tr>
                        <td> Harga Automatic </td> <td>@currency($tipe->harga_automatic)</td>
                    </tr>
                    <tr>
                        <td> Minimal Angsuran </td> <td>@currency($tipe->minimal_angsuran)</td>
                    </tr>
                    <tr>
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
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
