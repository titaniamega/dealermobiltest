@extends('adminlte::page')
@section('title', 'Tipe Produk')
@section('content_header')
    <h1 class="m-0 text-dark">Tipe Produk</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('tipe.create')}}" class="btn btn-outline-primary mb-2">
                    <i class="fa fa-plus-circle"></i> Tambah Tipe Produk
                    </a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                            <th width="150">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tipe as $key => $tipe)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$tipe->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>{{$tipe->nama_produk}}</td>
                                <td>{{$tipe->nama_tipe}}</td>
                                <td>@currency($tipe->harga)</td>
                                <td>@currency($tipe->harga_automatic)</td>
                                <td>{{$tipe->minimal_angsuran}}</td>
                                <td>{{$tipe->bonus}}</td>
                                <td>
                                    <a href="{{route('tipe.show', $tipe->id)}}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('tipe.edit', $tipe->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="{{route('tipe.destroy', $tipe->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#dataTipe').DataTable({
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