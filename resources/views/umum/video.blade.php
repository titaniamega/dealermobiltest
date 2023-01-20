@extends('umum.master')
@section('content')
      <x-embed-styles />
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="responsive-font text-center">Video Review</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <div class="justify-content-center">
                    <div class="row">
                        @foreach($video as $v)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$v->nama_produk}}</div>
                                    <x-embed url="{{$v->link_video}}" />                      
                                    <div class="card-body p-1">
                                    <div class="text-center">                                 
                                        <h5 class="fw-bolder"><a class="text-danger" href="{{route('umum.detailVideo',$v->id)}}">{{$v->judul_video}}</a></h5>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <style>
            .card{
            padding: 2.0em .5em .5em;
            border-radius: 7px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }
            .card:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            }         
        </style> 
@stop