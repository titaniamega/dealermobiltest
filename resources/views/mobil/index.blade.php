@extends('adminlte::page')
@section('title', 'Data Mobil')
@section('content_header')
    <h1 class="m-0 text-dark">Data Mobil</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('mobil.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk Mobil</th>
                            <th>Tipe Mobil</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mobils as $key => $mobil)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$mobil->merk_mobil}}</td>
                                <td>{{$mobil->tipe_mobil}}</td>
                                <td>@currency($mobil->harga)</td>
                                <td>
                                    <a href="{{route('mobil.edit', $mobil->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('mobil.destroy', $mobil->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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