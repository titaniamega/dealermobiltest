@extends('adminlte::page')
@section('title', 'Produk')
@section('content_header')
    <h1 class="m-0 text-dark">Produk</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('produk.create')}}" class="btn btn-primary mb-2">
                        Tambah Data Produk
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Model</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th width="150">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produk as $key => $produk)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$produk->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>{{$produk->nama_produk}}</td>
                                <td>@currency($produk->harga)</td>
                                <td>
                                <img src="{{url('images/'.$produk->gambar)}}" width="60">
                                </td>
                                <td>
                                    <a href="{{route('produk.show', $produk->id)}}" class="btn btn-primary btn-xs">
                                        Detail
                                    </a>
                                    <a href="{{route('produk.edit', $produk->id)}}" class="btn btn-warning btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('produk.destroy', $produk->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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