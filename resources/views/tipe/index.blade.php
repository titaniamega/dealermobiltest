@extends('adminlte::page')
@section('title', 'Tipe Produk')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Tipe Produk</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Tipe Produk
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('tipe.create')}}"><i class="fa fa-plus-circle"></i> Tambah Tipe</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataTipe">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Model</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Harga Automatic</th>
                            <th>Minimal Angsuran</th>
                            <th>Bonus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tipe as $key => $tipe)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $tipe->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$tipe->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>{{$tipe->nama_produk}}</td>
                                <td>{{$tipe->nama_tipe}}</td>
                                <td>@currency($tipe->harga)</td>
                                <td>@currency($tipe->harga_automatic)</td>
                                <td>{{$tipe->minimal_angsuran}}</td>
                                <td>{{Str::limit($tipe->bonus, 30)}}</td>
                                <td>
                                    <a href="{{route('tipe.show', $tipe->id)}}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('tipe.edit', $tipe->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('tipe.destroy', $tipe->id) }}" method="POST">
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
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#dataTipe').DataTable({
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
                            url: 'tipe/destroy/' + deleteid,
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