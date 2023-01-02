@extends('adminlte::page')
@section('title', 'Tambah Tipe Produk')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Tipe Produk</h1>
@stop
@section('content')
    <form action="{{route('tipe.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputProduk">Model</label>
                        <select class="form-control" name="id_produk" id="select_produk" required>
                            <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $model)
                            <option value="{{$model->id_produk}}"> {{$model->nama_produk}} </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col">
                        <label for="exampleInputTipe">Nama Tipe</label>
                        <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror" id="exampleInputTipe" placeholder="Tipe Produk" name="nama_tipe">
                        @error('nama_tipe') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputHarga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputHarga" placeholder="Harga mobil" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputHargaAuto">Harga (Automatic)</label>
                        <input type="number" class="form-control @error('harga_automatic') is-invalid @enderror" id="exampleInputHargaAuto" placeholder="Harga mobil auto" name="harga_automatic" value="{{old('harga_automatic')}}">
                        @error('harga_automatic') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputMinAngs">Minimal Angsuran</label>
                        <input type="number" class="form-control @error('minimal_angsuran') is-invalid @enderror" id="exampleInputMinAngs" placeholder="Minimal angsuran" name="minimal_angsuran" value="{{old('minimal_angsuran')}}">
                        @error('minimal_angsuran') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col">
                        <label for="exampleInputBayarPer">Bayar Pertama</label>
                        <input type="number" class="form-control @error('bayar_pertama') is-invalid @enderror" id="exampleInputBayarPer" placeholder="Bayar pertama" name="bayar_pertama" value="{{old('bayar_pertama')}}">
                        @error('bayar_pertama') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <label for="exampleInputDeskripsi">Bonus</label>
                        <textarea class="form-control" name="bonus" id="bonus" rows="4" cols="30" value="{{old('bonus')}}"> </textarea>
                        </div>
                    </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('produk.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
