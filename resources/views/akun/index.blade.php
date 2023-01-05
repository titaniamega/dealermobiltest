@extends('adminlte::page')
@section('title', 'Manajemen Akun')
@section('content_header')
    <h1 class="m-0 text-dark">Manajemen Akun</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('akun.create')}}" class="btn btn-outline-primary mb-2">
                        Tambah Akun
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($akun as $key => $akuns)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$akuns->name}}</td>
                                <td>{{$akuns->email}}</td>
                                <td>{{$akuns->role}}</td>
                                <td>
                                    <a href="{{route('akun.show', $akuns->id)}}" class="btn btn-outline-primary btn-xs">
                                        Detail
                                    </a>
                                    <a href="{{route('akun.edit', $akuns->id)}}" class="btn btn-outline-warning btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('akun.destroy', $akuns->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
