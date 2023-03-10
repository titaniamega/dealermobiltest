@extends('adminlte::page')
@section('title', 'Edit Data Akun')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Data Akun</h1>
@stop
@section('content')
    <form action="{{route('akun.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="row">
    <div class="col-12">
        <div class="card">      
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputNamaUser">Nama User</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama User" value="{{ $user->name }}" required>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputRole" class="control-label">Role</label> 
                        <select class="form-control" name="role" id="selectRole" required>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin"  {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPass" class="control-label">Password</label>
                        <input type="hidden" class="form-control" name="password_old" placeholder="Password" value="{{ $user->password }}">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
            </div>
        <div class="card-footer bg-transparent">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('akun.index')}}" class="btn btn-warning">Batal</a>
        </div>
        </div>
    </div>
    <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop