@extends('adminlte::page')
@section('title', 'Berita')
@section('content_header')
    <h1 class="m-0 text-dark">Data Berita</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('berita.create')}}" class="btn btn-outline-primary mb-2">
                    <i class="fa fa-plus-circle"></i> Tambah Berita
                    </a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
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
                                    <a href="{{route('berita.destroy', $beritas->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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