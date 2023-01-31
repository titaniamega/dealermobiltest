@extends('adminlte::page')
@section('title', 'Tambah Data Akun')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Akun</h1>
@stop
@section('content')
    <form action="{{route('akun.store')}}" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputNamaUser">Nama User</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama User" required>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputRole" class="control-label">Role</label> 
                        <select class="form-control" name="role" id="selectRole" required>
                            <option value="user" >User</option>
                            <option value="admin" >Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPass" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('akun.index')}}" class="btn btn-warning">Batal</a>
        </div>
    </div>
@stop