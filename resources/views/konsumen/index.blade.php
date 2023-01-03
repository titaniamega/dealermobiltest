@extends('adminlte::page')
@section('title', 'Konsumen')
@section('content_header')
    <h1 class="m-0 text-dark">Data Konsumen</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('konsumen.create')}}" class="btn btn-primary mb-2">
                        Tambah Data Konsumen
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Nama Konsumen</th>
                            <th>Produk</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($konsumen as $key => $konsumens)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$konsumens->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                <img src="{{url('/images/konsumen/'.$konsumens->gambar)}}" width="60">
                                </td>
                                <td>{{$konsumens->nama_konsumen}}</td>
                                <td>{{$konsumens->nama_produk}}</td>
                                <td>
                                    <a href="{{route('konsumen.edit', $konsumens->id)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('konsumen.destroy', $konsumens->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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