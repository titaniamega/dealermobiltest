@extends('umum.master')
@section('content')
  
        <!-- Section-->
        <section class="py-5" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="text-center">
                <h1 class="responsive-font">Daftar Produk</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
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
                                 <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="{{route('umum.detailProduk',$p->id)}}">Lihat Selengkapnya</a></div>
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