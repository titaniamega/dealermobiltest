@extends('adminlte::page')
@section('title', 'Produk')
@section('content_header')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <h1 class="m-0 text-dark">Produk</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('produk.create')}}" class="btn btn-outline-primary mb-2">
                        Tambah Data Produk
                    </a>
                    
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-hover table-bordered table-stripped" id="tbl_list">
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
                                    <a href="{{route('produk.show', $produk->id)}}" class="btn btn-outline-primary btn-xs"> <i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('produk.edit', $produk->id)}}" class="btn btn-outline-warning btn-xs"> <i class="fa fa-edit" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="{{route('produk.destroy', $produk->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"> <i class="fa fa-trash " aria-hidden="true"></i>
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
    <script type="text/javascript">
    $(function () {
        $('#tbl_list').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
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