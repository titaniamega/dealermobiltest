@extends('adminlte::page')
@section('title', 'Paket Kredit')
@section('content_header')
    <h1 class="m-0 text-dark">Data Paket Kredit Global</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('kredit.create')}}" class="btn btn-outline-primary mb-2">
                        Tambah Data Paket Kredit
                    </a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-hover table-bordered table-stripped" id="example2">
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
                                <td>{{$key+1}}</td>
                                <td>{{$kredits->nama_produk}}</td>
                                <td>{{$kredits->harga_mulai}}</td>
                                <td>{{$kredits->dp_mulai}}</td>
                                <td>{{$kredits->cicilan_mulai}}</td>
                                <td>{{$kredits->tenor}}</td>
                                <td>
                                    <a href="{{route('kredit.edit', $kredits->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="{{route('kredit.destroy', $kredits->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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