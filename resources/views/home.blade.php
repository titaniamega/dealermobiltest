@extends('adminlte::page')
@section('title', 'Dealer')
@section('content_header')
    <h1 class="m-0 text-dark">Selamat Datang, </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('promo.create')}}" class="btn btn-outline-danger btn-sm mb-2">
                    <i class="fa fa-trash"></i> Hapus Timeline Aktivitas
                    </a>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataLog">
                        <tbody>
                            <tr class="text-center bg-info">
                            <td> User </td>
                            <td> Role </td>
                            <td> Activity </td>
                            <td> Time </td>
                            </tr>
                        @foreach($activity_log as $item)
                            <tr class="text-center">
                                <td>
                                    <h5><span class="badge badge-light">{{$item->user->name}}</span></h5>
                                </td>
                                <td>
                                    <h5><span class="badge badge-success">{{$item->user->role}}</span></h5>
                                </td>
                                <td>
                                    <h5><span class="badge badge-info">{{$item->description}}</span></h5>
                                </td>
                                <td>
                                    <h5><span class="badge badge-warning">{{$lastUpdated=$item->created_at->diffForHumans()}}</span></h5>
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
