@extends('adminlte::page')
@section('title', 'Promo')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Promo</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Promo
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('promo.create')}}"><i class="fa fa-plus-circle"></i> Tambah Promo</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataPromo">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Produk</th>
                            <th>Keterangan</th>
                            <th>Berlaku Sampai</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promo as $key => $promos)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $promos->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$promos->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                <img src="{{url('/images/promo/'.$promos->gambar)}}" width="60">
                                </td>
                                <td>{{$promos->judul}}</td>
                                <td>{{$promos->nama_produk}}</td>
                                <td>{!! Str::limit($promos->keterangan, 20) !!}</td>
                                <td>{{$promos->masa_berlaku?->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                    <a href="{{route('promo.edit', $promos->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('promo.destroy', $promos->id) }}" method="POST">
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#dataPromo").DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            })
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
                            url: 'promo/destroy/' + deleteid,
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