@extends('adminlte::page')
@section('title', 'Manajemen Akun')
@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Akun </h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered martop-sm">
                    <tr>
                        <td> ID User</td> <td>{{$akun->id}}</td>
                    </tr>
                        <td> Nama </td> <td>{{$akun->name}}</td>
                    </tr>
                    <tr>
                        <td> Email </td> <td>{{$akun->email}}</td>
                    </tr>
                    <tr>
                        <td> Role </td> <td>{{$akun->role}}</td>
                    </tr>
                    <table>
                </div>
                <div class="card-footer">
                <a href="{{ route('akun.edit', $akun->id) }}" 
                    class="btn btn-warning btn-sm">Ubah</a>
                    <a href="{{ route('akun.index') }}" 
                    class="btn btn-default btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@stop


