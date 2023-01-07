@extends('umum.master')
@section('content')
 <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Website Dealer</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Temukan Kavling Idaman Anda Bersama Kami</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($kaveling as $p)
                     <div class="col mb-5">
                           <div class="card h-100">
                              @if($p->terjual == "Ya")
                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Terjual</div>
                              @endif
                              <!-- Product image-->
                              <img class="card-img-top" src="{{url('images/detail/'.$p->kaveling_det_gambar)}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-4">
                                 <div class="text-center">
                                       <!-- Product name-->
                                       <h5 class="fw-bolder">{{$p->kaveling_det_nomor}} - {{$p->kaveling_lokasi}} {{$p->kaveling_det_nama}}</h5>
                                       <!-- Product price-->
                                       {{uang($p->kaveling_det_harga)}}
                                 </div>
                                 <p>
                                       <dl class="row">
                                            <dt class="col-4">Alamat</dt>
                                            <dd class="col-8">{{$p->kaveling_alamat}}</dd>
                                            <dt class="col-4">Luas</dt>
                                            <dd class="col-8">{{$p->kaveling_det_luas}}M<sup>2</sup></dd>
                                        </dl>
                                       </p>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                 <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('umum.detail',$p->kaveling_det_id)}}">Detail</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
    </section>
@stop