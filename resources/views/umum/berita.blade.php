@extends('umum.master')
@section('content')
   
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <div class="text-center">
                <h1 class="responsive-font">Berita Terupdate</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #7c4dff; height: 2px"/>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($berita as $b)
                     <div class="col mb-5">
                           <div class="card h-100">
                                 <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$b->nama_produk}}</div>
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
                                 <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{route('umum.detailBerita',$b->id)}}">Baca Berita</a></div>
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