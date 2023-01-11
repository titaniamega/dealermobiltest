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
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($video as $v)
                     <div class="col mb-5">
                           <div class="card h-100">
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
@stop