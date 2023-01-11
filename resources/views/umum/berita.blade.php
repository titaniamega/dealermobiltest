@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Berita Update</h1>
            <p class="lead fw-normal text-white-50 mb-0">Berita Terbaru dan Terupdate  {{date('M Y')}}</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-4">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($berita as $b)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$b->nama_produk}}</div>
                                 <div class="badge bg-light position-absolute" style="top: 0.5rem; left: 0.5rem">
                                 {{$b->updated_at->isoFormat('D MMMM Y')}}
                                 </div>
                              <img class="card-img-top" src="{{url('images/berita/'.$b->gambar_berita)}}" alt="..."  />                         
                              <div class="card-body p-1">
                                 <div class="text-center">                                 
                                       <h5 class="fw-bolder">{{$b->judul_berita}}</h5>  
                                       <p>{{Str::limit($b->keterangan, 100)}}</p> 
                                 </div>
                              </div>
                              <!-- Product actions-->
                              <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                 <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{route('umum.detailBerita',$b->id)}}">Lihat Berita</a></div>
                              </div>
                           </div>
                     </div>
                    @endforeach
                </div>
            </div>
    </section>
@stop