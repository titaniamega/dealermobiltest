@extends('umum.master')
@section('content')
      <!-- Header-->
      <x-embed-styles />
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Welcome</h1>
            <p class="lead fw-normal text-white-50 mb-0">Dealer Mobil Indonesia</p>
            </div>
        </header>     
        
         <!-- Section-->
         <section class="py-1">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="display-4 fw-bolder">Rekomendasi Produk</h1>
                <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 100%; background-color: #7c4dff; height: 2px"
                        />
                <p class="lead fw-normal text-black-50 mb-0"><strong>Mobil Baru Pilihan Dengan Harga Terbaik</p><br>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($produk as $p)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$p->nama_produk}}</div>
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
                                 <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="">Lihat Selengkapnya</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section-->
        <section class="bg-dark">
            <div class="container px-4 px-lg-5 mt-5">               
                <div class="justify-content-center">
                    <h1 class="py-3 display-4 fw-bolder">Layanan Kami</h1>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 100%; background-color: #7c4dff; height: 2px"
                        />
                    <p class="lead fw-normal text-white-50 mb-0"><strong>Memberikan yang Terbaik Untuk Mendapatkan Mobil Impian Anda.</p><br>
                    <div class="row">                       
                            <div class="col-md-3">
                                <div class="card bg-light h-80">
                                    <img src="{{ ('images/icon/credit-card.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Melayani Cash Dan Kredit</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-light h-80">
                                    <img src="{{ ('images/icon/megaphone.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Banyak Promo & Diskon</h5>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="card bg-light h-80">
                                    <img src="{{ ('images/icon/car.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Bisa Test Drive Mobil Sepuasnya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-light h-80">
                                    <img src="{{ ('images/icon/cashback.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Cashback Jutaan & Hadiah Menarik</h5>
                                    </div>
                                </div>
                            </div>                   
                    </div>
                </div>
            </div>
        </section>

        <!-- Section-->
        <section class="py-4">
            <div class="container px-4 px-lg-5 mt-5">
                    <h1 class="display-4 fw-bolder">Video Review</h1>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 100%; background-color: #7c4dff; height: 2px"
                        />
                    <p class="lead fw-normal text-black-50 mb-0"><strong>Lihat Video Representasi & Review Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p><br>
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
            padding: 1.5em .5em .5em;
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