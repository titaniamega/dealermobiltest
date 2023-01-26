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
                    <i class="fa fa-plus-circle"></i> Tambah Akun
                    </a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataAkun">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Terdaftar</th>
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
                                <td>{{$akuns->created_at}}</td>
                                <td>{{$akuns->name}}</td>
                                <td>{{$akuns->email}}</td>
                                <td>{{$akuns->role}}</td>
                                <td>
                                    <a href="{{route('akun.show', $akuns->id)}}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('akun.edit', $akuns->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="{{route('akun.destroy', $akuns->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#dataAkun').DataTable({
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
