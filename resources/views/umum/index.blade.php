@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </header>
        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($produk as $p)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$p->nama_produk}}</div>
                              <!-- Product image-->
                              <img class="card-img-top" src="{{url('images/'.$p->gambar)}}" alt="..." />
                              <!-- Product details-->
                              <div class="card-body p-3">
                                 <div class="text-center">
                                       <!-- Product name-->
                                       <h5 class="fw-bolder">{{$p->nama_produk}}</h5>
                                       <!-- Product price-->
                                        @currency($p->harga)
                                 </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                 <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="">Selengkapnya</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
                <h1 class="display-4 fw-bolder">Video Review</h1>
                <p class="lead fw-normal text-black-50 mb-0"><strong>Lihat Video Representasi & Review Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($video as $v)
                     <div class="col mb-5 col-md-4">
                           <div class="card h-100">
                              <img class="card-img-top" src="{{"https://i.ytimg.com/vi/".preg_replace('/(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})/m', '$1', $v->link_video)."/hqdefault.jpg" }}" alt="..." />
                                 <div class="card-body p-3">
                                 <div class="text-center">
                                    <h5 class="fw-bolder">{{$v->judul_video}}</h5>
                                 </div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
        </section>
   
@stop