@extends('adminlte::page')
@section('title', 'Promo')
@section('content_header')
    <h1 class="m-0 text-dark">Data Promo</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('promo.create')}}" class="btn btn-outline-primary mb-2">
                    <i class="fa fa-plus-circle"></i> Tambah Promo
                    </a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success martop-sm">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                                    <a href="{{route('promo.destroy', $promos->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash " aria-hidden="true"></i>
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

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
@endpush