@extends('adminlte::page')
@section('title', 'Produk')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Produk</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Produk
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('produk.create')}}"><i class="fa fa-plus-circle"></i> Tambah Produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataProduk">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Model</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produk as $key => $produk)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $produk->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$produk->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>{{$produk->nama_produk}}</td>
                                <td>@currency($produk->harga)</td>
                                <td>
                                <img src="{{url('images/'.$produk->gambar)}}" width="60">
                                </td>
                                <td align="center">
                                    <a href="{{route('produk.show', $produk->id)}}" class="btn btn-outline-primary btn-xs"> <i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('produk.edit', $produk->id)}}" class="btn btn-outline-warning btn-xs"> <i class="fa fa-edit" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
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
<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Dealer Mobil Indonesia </strong> All rights reserved.
</footer>
@stop
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(function () {
                $('#dataProduk').DataTable({
                    "paging": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
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
                            url: 'produk/destroy/' + deleteid,
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
@stop