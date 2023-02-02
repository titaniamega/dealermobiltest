@extends('adminlte::page')
@section('title', 'Berita')
@section('content_header')
@include('sweetalert::alert')
    <h1 class="m-0 text-dark">Berita</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Berita
                    </div>
                    <div class="float-right">
                        <a class="btn btn-outline-success" href="{{route('berita.create')}}"><i class="fa fa-plus-circle"></i> Tambah Berita</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataBerita">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($berita as $key => $beritas)
                            <tr>
                            <input type="hidden" class="delete_id" value="{{ $beritas->id }}">
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$beritas->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                <img src="{{url('/images/berita/'.$beritas->gambar_berita)}}" width="60">
                                </td>
                                <td>{{$beritas->judul_berita}}</td>
                                <td width="200">{{Str::limit($beritas->keterangan, 50)}}</td>
                                <td>
                                    <a href="{{route('berita.show', $beritas->id)}}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('berita.edit', $beritas->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('berita.destroy', $beritas->id) }}" method="POST">
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
        $('#dataBerita').DataTable({
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
                            url: 'berita/destroy/' + deleteid,
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