@extends('umum.master')
@section('content')
        <!-- Section-->
        <section class="py-5" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <h1 class="responsive-font text-center">Galeri Konsumen</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
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