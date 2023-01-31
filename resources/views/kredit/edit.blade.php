@extends('adminlte::page')
@section('title', 'Edit Data Kredit')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Kredit</h1>
@stop
@section('content')
    <form action="{{route('kredit.update',$kredit->id)}}" method="post">
        @csrf
        @method('PUT')
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kredit') ? 'has-error' : '' }}">
                        <label for="exampleInputProduk">Model</label>
                        <select class="form-control" name="id_produk" id="select_produk" required focus>
                        <option value="" disabled selected>Pilih Model Produk</option>
                            @foreach($produk as $pro)
                            <option value="{{$pro->id}}" {{ $pro->id == $kredit->id_produk ? 'selected' : ''}}>
                                {{ $pro->nama_produk }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kredit') ? 'has-error' : '' }}">
                        <label for="exampleInputHargaMulai">Harga Mulai</label>
                        <input type="number" class="form-control @error('harga_mulai') is-invalid @enderror" id="exampleInputHargaMulai" placeholder="Harga mulai" name="harga_mulai" value="{{$kredit->harga_mulai}}">
                        @error('harga_mulai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kredit') ? 'has-error' : '' }}">
                        <label for="exampleInputDpMulai">DP Mulai</label>
                        <input type="number" class="form-control @error('dp_mulai') is-invalid @enderror" id="exampleInputDpMulai" placeholder="DP Mulai" name="dp_mulai" value="{{$kredit->dp_mulai}}">
                        @error('dp_mulai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kredit') ? 'has-error' : '' }}">
                        <label for="exampleInputCicilanMulai">Cicilan Mulai</label>
                        <input type="number" class="form-control @error('cicilan_mulai') is-invalid @enderror" id="exampleInputCicilanMulai" placeholder="Cicilan Mulai" name="cicilan_mulai" value="{{$kredit->cicilan_mulai}}">
                        @error('cicilan_mulai') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputTenor">Tenor</label>
                        <input type="number" class="form-control @error('tenor') is-invalid @enderror" id="exampleInputTenor" placeholder="Tenor" name="tenor" value="{{$kredit->tenor}}">
                        @error('tenor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('kredit.index')}}" class="btn btn-warning">Batal</a>
            </div>
            </div>
        </div>
    </div>
@stop
