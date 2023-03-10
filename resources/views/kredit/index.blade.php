@extends('adminlte::page')
@section('title', 'Paket Kredit')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Paket Kredit Global</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Paket Kredit
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('kredit.create')}}"><i class="fa fa-plus-circle"></i> Tambah Paket</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataKredit">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Mulai</th>
                            <th>DP Mulai</th>
                            <th>Cicilan Mulai</th>
                            <th>Tenor</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kredit as $key => $kredits)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $kredits->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$kredits->nama_produk}}</td>
                                <td>@currency($kredits->harga_mulai)</td>
                                <td>@currency($kredits->dp_mulai)</td>
                                <td>@currency($kredits->cicilan_mulai)</td>
                                <td>{{$kredits->tenor}}</td>
                                <td align="center">
                                    <a href="{{route('kredit.edit', $kredits->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('kredit.destroy', $kredits->id) }}" method="POST">
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
        $('#dataKredit').DataTable({
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
                            url: 'kredit/destroy/' + deleteid,
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