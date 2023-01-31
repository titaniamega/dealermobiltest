@extends('adminlte::page')
@section('title', 'Contact')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Informasi Contact</h1>
@stop
@section('content')
    <form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
        @csrf
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                    <div class="form-group">
                        <div>
                        <input type="hidden" name="id" value="{{$contact?->id}}">
                        </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputNamaUser">Nama Contact</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Contact" value="{{$contact?->nama}}" >
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelepon" class="control-label">Telepon</label>
                        <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="{{$contact?->telepon}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputTelepon2" class="control-label">Telepon (Cadangan)</label>
                        <input type="text" class="form-control" name="telepon2" placeholder="Telepon" value="{{$contact?->telepon2}}">
                        @error('telepon2') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$contact?->email}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputWhatsapp" class="control-label">Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" value="{{$contact?->whatsapp}}">
                        @error('whatsaap') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputNamaDealer" class="control-label">Nama Dealer</label>
                        <input type="text" class="form-control" name="nama_dealer" placeholder="Nama Dealer" value="{{$contact?->nama_dealer}}">
                        @error('nama_dealer') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleInputAlamatKantor" class="control-label">Alamat Kantor</label>
                        <input type="text" class="form-control" name="alamat_kantor" placeholder="Alamat Kantor" value="{{$contact?->alamat_kantor}}">
                        @error('alamat_kantor') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                        <input type="hidden" name="foto_profil" value="{{ $contact?->foto_profil }}" >
                        <img src="{{url('images/profil/'.$contact?->foto_profil)}}" width="100"/>
                        </div>
                        <div class="col">
                        <label for="gambar" class="control-label">Ubah Foto</label><br>
                        <input type="file" name="foto_profil">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
@stop