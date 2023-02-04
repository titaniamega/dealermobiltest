@extends('adminlte::page')
@section('title', 'Detail Produk')
@section('content_header')
    <h1>Detail Produk : {{$produk->nama_produk}}</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        <h5>Tanggal : <span class="badge badge-pill badge-primary">{{ $registeredAt=$produk->created_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                        <div class="col-md-6">
                        <h5>Diperbarui : <span class="badge badge-pill badge-primary">{{ $registeredAt=$produk->updated_at->isoFormat('dddd, D MMMM Y') }}</span></h5>
                        </div>
                        </div>
                </div>
                <div class="card-body">
                        <dl class="row">
                        <dt class="col-3">Nama</dt>
                        <dd class="col-9">{{$produk->nama_produk}}</dd>

                        <dt class="col-3">Harga</dt>
                        <dd class="col-9">@currency($produk->harga)</dd>
                        </dl>
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
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
