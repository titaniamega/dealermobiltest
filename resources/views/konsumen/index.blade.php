@extends('adminlte::page')
@section('title', 'Konsumen')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Konsumen</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Konsumen
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('konsumen.create')}}"><i class="fa fa-plus-circle"></i> Tambah Konsumen</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataKonsumen">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($konsumen as $key => $konsumens)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $konsumens->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$konsumens->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                <img src="{{url('/images/konsumen/'.$konsumens->gambar)}}" width="60">
                                </td>
                                <td>{{$konsumens->nama_konsumen}}</td>
                                <td>{{$konsumens->nama_produk}}</td>
                                <td>
                                    <a href="{{route('konsumen.edit', $konsumens->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('konsumen.destroy', $konsumens->id) }}" method="POST">
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
        $('#dataKonsumen').DataTable({
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
                            url: 'konsumen/destroy/' + deleteid,
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