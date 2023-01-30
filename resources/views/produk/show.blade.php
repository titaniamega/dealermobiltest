@extends('adminlte::page')
@section('title', 'Detail Produk')
@section('content_header')
    <h1>Detail Produk : {{$produk->nama_produk}}</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                <label>Tanggal : </label>
                                <input disabled class="form-control" value="{{ $registeredAt=$produk->created_at->isoFormat('dddd, D MMMM Y') }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                <label>Tanggal Diperbarui : </label>
                                <input disabled class="form-control" value="{{ $registeredAt=$produk->updated_at->isoFormat('dddd, D MMMM Y') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                <label>Model</label>
                                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" readonly="readonly" placeholder="Nama Produk">
                                </div>
                                <div class="col-md-6 mb-2">
                                <label>Harga</label>
                                <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" placeholder="Harga Mobil" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                <label>Gambar</label>
                                <img src="{{url('images/'.$produk->gambar)}}" class="img-fluid img-thumbnail"/> 
                                </div>
                                <div class="col-md-6 mb-2">
                                <label>Gambar Slide</label>
                                <img src="{{url('slides/'.$produk->gambarslide)}}" class="img-fluid img-thumbnail"/>
                                </div>  
                            </div>
                        </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        {!! $produk->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
