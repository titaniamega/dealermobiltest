@extends('adminlte::page')
@section('title', 'Video')
@section('content_header')
    <h1 class="m-0 text-dark">Data Video</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('video.create')}}" class="btn btn-outline-primary mb-2">
                    <i class="fa fa-plus-circle"></i> Tambah Video
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
                            <th>Produk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($video as $key => $videos)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$registeredAt=$videos->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td>
                                <img src="{{"https://i.ytimg.com/vi/".preg_replace('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})/m', '$1', $videos->link_video)."/hqdefault.jpg" }}" width="100"/>
                                </td>
                                <td>{{$videos->judul_video}}</td>
                                <td>{{$videos->nama_produk}}</td>
                                <td width="70"></td>
                                <td>
                                    <a href="{{route('video.show', $videos->id)}}" class="btn btn-outline-primary btn-xs"><i class="fa fa-eye " aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a href="{{route('video.edit', $videos->id)}}" class="btn btn-outline-warning btn-xs"><i class="fa fa-edit " aria-hidden="true"></i>
                                        Edit
                                    </a>
                                    <a href="{{route('video.destroy', $videos->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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