@extends('adminlte::page')
@section('title', 'Manajemen Akun')
@section('content_header')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
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
                            <input type="hidden" class="delete_id" value="{{ $akuns->id }}">
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
                                    <form action="{{ route('akun.destroy', $akuns->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-xs btndelete">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('#dataAkun').DataTable({
            "responsive": true,
        });

        $('.btndelete').click(function (e) {
            e.preventDefault();

            var deleteid = $(this).closest("tr").find('.delete_id').val();

            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah dihapus, Anda tidak dapat memulihkan ini lagi!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name=_token]').val(),
                            'id': deleteid,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: 'akun/destroy/' + deleteid,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });
    </script>
@endpush
