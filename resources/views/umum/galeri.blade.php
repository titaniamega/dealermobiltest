@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Galeri Konsumen</h1>
            <p class="lead fw-normal text-white-50 mb-0">Lihat Video Representasi & Review Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($konsumen as $k)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$k->nama_produk}}</div>
                                 <div class="badge bg-success position-absolute" style="top: 0.5rem; left: 0.5rem">
                                 {{$k->updated_at->isoFormat('D MMMM Y')}}
                                 </div>
                              <img class="card-img-top" src="{{url('images/konsumen/'.$k->gambar)}}" alt="..."  />                         
                              <div class="card-body p-1">
                                 <div class="text-center">                                 
                                       <h5 class="fw-bolder">{{$k->nama_produk}}</h5>
                                 </div>
                              </div>
                                                          
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
    </section>
@stop