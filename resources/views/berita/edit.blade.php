@extends('adminlte::page')
@section('title', 'Edit Data Berita')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Berita</h1>
@stop
@section('content')
    <form action="{{route('berita.update', $berita->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('berita') ? 'has-error' : '' }}">
                        <label for="exampleInputProduk" class="control-label">Produk</label>
                        <select class="form-control" name="id_produk" id="select_produk" required focus>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $pro)
                            <option value="{{$pro->id}}" {{ $pro->id == $berita->id_produk ? 'selected' : ''}}>
                                {{ $pro->nama_produk }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('berita') ?'has-error' : '' }}">
                        <label for="exampleInputJudul">Judul Berita</label>
                        <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="exampleInputJudulBerita" placeholder="Judul Berita" name="judul_berita" value="{{$berita->judul_berita}}">
                        @error('judul_berita') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('berita') ?'has-error' : '' }}">
                    <label for="exampleInputKeterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="exampleInputKeterangan" rows="4" cols="30">{{$berita->keterangan}} </textarea>
                    @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gambar_berita" class="control-label">Ubah Gambar</label><br>
                        <input type="file" name="gambar_berita">
                    </div>
                    <div class="form-group {{ $errors->has('berita') ?'has-error' : '' }}">
                        <input type="hidden" name="gambarberitalama" value="{{ $berita->gambar_berita}}" >
                        <img src="{{url('images/berita/'.$berita->gambar_berita)}}" width="100"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('berita.index')}}" class="btn btn-warning">Batal</a>
        </div>
    </div>
    <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
