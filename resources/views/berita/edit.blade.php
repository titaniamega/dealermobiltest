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
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputNama">Produk</label>
                        <select class="form-control" name="id_produk" id="select_produk" required>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $model)
                            <option value="{{$model->id}}"> {{$model->nama_produk}} </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col">
                        <label for="exampleInputJudul">Judul Berita</label>
                        <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="exampleInputJudulBerita" placeholder="Judul Berita" name="judul_berita" value="{{$berita->judul_berita}}">
                        @error('judul_berita') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group {{ $errors->has('berita') ?'has-error' : '' }}">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputGambarBerita">Gambar Berita</label>
                        <input type="hidden" name="gambarberitalama" value="{{ $berita->gambar_berita}}" >
                        <img src="{{url('images/berita/'.$berita->gambar_berita)}}" width="100"/>
                        </div>
                        <div class="form-group">
                        <label for="gambar_berita" class="control-label">Ubah Gambar</label><br>
                        <input type="file" name="gambar_berita">
                        </div>
                        <div class="col">
                        <label for="exampleInputKeterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="exampleInputKeterangan" rows="4" cols="30">{{$berita->keterangan}} </textarea>
                        @error('keterangan') <span class="text-danger">{{$message}}</span> @enderror   
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('berita.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
