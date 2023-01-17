@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Daftar Mobil</h1>
            <p class="lead fw-normal text-white-50 mb-0">Semua Tipe Terbaru Terbaik Sesuai Pilihan Anda berlaku {{date('Y')}}</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
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
                                 <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{route('umum.detailProduk',$p->id)}}">Lihat Selengkapnya</a></div>
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