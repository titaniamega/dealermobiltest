@extends('umum.master')
@section('content')
      <!-- Header-->
      <x-embed-styles />
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Video Review</h1>
            <p class="lead fw-normal text-white-50 mb-0">Lihat Video Representasi & Review Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p>
            </div>
        </header>     
        
        <!-- Section-->
        <section class="py-4">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="justify-content-center">
                    <div class="row">
                        @foreach($video as $v)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$v->nama_produk}}</div>
                                    <x-embed url="{{$v->link_video}}" />                      
                                    <div class="card-body p-1">
                                    <div class="text-center">                                 
                                        <h5 class="fw-bolder">{{$v->judul_video}}</h5>
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