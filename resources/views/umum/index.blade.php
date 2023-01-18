@extends('umum.master')
@section('content')
      <!-- Header-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <x-embed-styles />

        <section style="padding-top : 64px !important">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @foreach($produk as $key => $pro)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img class="d-block w-100" src="{{url('slides/'.$pro->gambarslide)}}">
                </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </section>
        
         <!-- Section-->
         <section class="py-1">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="responsive-font text-center">Rekomendasi Produk</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <p class="responsive-font-ex text-center">Mobil Baru Pilihan Dengan Harga Terbaik</p><br>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                   @foreach($produkindex as $p)
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
                                 <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="{{route('umum.detailProduk',$p->id)}}">Lihat Selengkapnya</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <a class="btn btn-danger btn-block" href="{{url('/umum/produk/')}}" role="button">Tampilkan Lainnya</a>
                    </div>
                </div>
        </section>

        <!-- Section-->
        <section class="bg-dark mt-2">
            <div class="container px-4 px-lg-5 mt-5">               
                <div class="justify-content-center">
                    <h1 class="responsive-font text-center">Layanan Kami</h1>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                    <p class="responsive-font-ex text-center">Memberikan yang Terbaik Untuk Mendapatkan Mobil Impian Anda.</p><br>
                    <div class="row">                       
                            <div class="col-md-3 px-3">
                                <div class="card bg-light">
                                    <img src="{{ url('images/icon/cash.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Melayani Cash Dan Kredit</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <div class="card bg-light">
                                    <img src="{{ url('images/icon/megaphone.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Banyak Promo & Diskon</h5>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-md-3 px-3">
                                <div class="card bg-light">
                                    <img src="{{ url('images/icon/car.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Bisa Test Drive Mobil Sepuasnya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <div class="card bg-light">
                                    <img src="{{ ('images/icon/coupon.png') }}" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">Cashback & Hadiah Menarik</h5>
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
                    <h1 class="responsive-font text-center">Promo</h1>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                    <p class="responsive-font-ex text-center">Lihat Promo Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p><br>
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($promoindex as $p)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$p->nama_produk}}</div>
                                 <div class="badge bg-success position-absolute" style="top: 0.5rem; left: 0.5rem">
                                 {{$p->masa_berlaku?->isoFormat('D MMMM Y')}}
                                 </div>
                              <img class="card-img-top" src="{{url('images/promo/'.$p->gambar)}}" alt="..."  />                         
                              <div class="card-body p-1">
                                 <div class="text-center">                                 
                                       <h5 class="fw-bolder">{{$p->judul}}</h5>
                                 </div>
                              </div>
                              <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                 <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="{{route('umum.detailPromo',$p->id)}}">Lihat Promo</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                    </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <a class="btn btn-danger btn-block" href="{{url('/umum/promo/')}}" role="button">Tampilkan Lainnya</a>
                    </div>
                </div>
                </div>
                </div>
            </div>
                
        </section>

        <!-- Section-->
        <section class="bg-dark">
            <div class="container px-4 px-lg-5 mt-5">               
                <div class="justify-content-center">
                    <h1 class="responsive-font text-center">Mengapa Memilih Kami?</h1>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px" />                    
                </div>
            </div>
        </section>

        <!-- Section-->
        <section class="py-4">
            <div class="container px-4 px-lg-5 mt-5">
                    <h1 class="responsive-font text-center">Video Review</h1>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 100%; background-color: #ff0000; height: 2px"
                        />
                    <p class="responsive-font-ex text-center">Lihat Video Representasi & Review Mobil Baru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p><br>
                <div class="justify-content-center">
                    <div class="row">
                        @foreach($videoindex as $v)
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
                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                            <a class="btn btn-danger btn-block" href="{{url('/umum/video/')}}" role="button">Tampilkan Lainnya</a>
                        </div>
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
          
            @media (min-width: 1200px) {
            .responsive-font {
                font-size: 50px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
            /* If the screen size is smaller than 1200px, set the font-size to 80px */
            @media (max-width: 1199.98px) {
            .responsive-font {
                font-size: 30px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
            @media (min-width: 1200px) {
            .responsive-font-ex {
                font-size: 17px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
            /* If the screen size is smaller than 1200px, set the font-size to 80px */
            @media (max-width: 1199.98px) {
            .responsive-font-ex {
                font-size: 15px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
            @media (min-width: 1200px) {
            .responsive-font-in {
                font-size: 25px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
            /* If the screen size is smaller than 1200px, set the font-size to 80px */
            @media (max-width: 1199.98px) {
            .responsive-font-in {
                font-size: 20px;
                font-family: "Montserrat", sans-serif !important;
            }
            }
                    
        </style>    
@stop