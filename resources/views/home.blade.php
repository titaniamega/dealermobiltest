@extends('adminlte::page')
@section('title', 'Dealer')
@section('content_header')
    <h1 class="m-0 text-dark">Selamat Datang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                Log Activity    
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataLog">
                        <tbody>
                            <tr  class="text-center">
                            <td> User </td>
                            <td> Role </td>
                            <td> Activity </td>
                            <td> Time </td>
                            </tr>
                        @foreach($activity_log as $item)
                            <tr>
                                <td>
                                    <span class="badge badge-success">{{$item->user->name}}</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">{{$item->user->role}}</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">{{$item->description}}</span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">{{$item->created_at}}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
@stop
