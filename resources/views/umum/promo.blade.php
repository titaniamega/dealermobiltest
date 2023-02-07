@extends('umum.master')
@section('content')    
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <h1 class="responsive-font text-center">Promo</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($promo as $p)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$p->nama_produk}}</div>
                                 <div class="badge bg-danger position-absolute" style="top: 0.5rem; left: 0.5rem">
                                 {{$p->masa_berlaku?->isoFormat('D MMMM Y')}}
                                 </div>
                              <img class="card-img-top" src="{{url('images/promo/'.$p->gambar)}}" alt="..."  />                         
                              <div class="card-body p-1">
                                 <div class="text-center">                                 
                                       <h5 class="fw-bolder"><a class="text-danger responsive-font-ex" href="{{route('umum.detailPromo',$p->id)}}">{{$p->judul}}</a></h5>
                                 </div>
                              </div>
                              <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                 <div class="text-center"><a class="btn btn-block btn-outline-danger mt-auto btn-sm responsive-font-ex" style="font-size: small;" href="{{route('umum.detailPromo',$p->id)}}">Lihat Promo</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
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