@extends('umum.master')
@section('content')
   
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="responsive-font text-center">Berita Terupdate</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <div class="justify-content-center">
                  <div class="row">
                  @foreach($berita as $b)
                  <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                        <img src="{{url('images/berita/'.$b->gambar_berita)}}" alt="" class="card-img-top">
                        <div class="card-body">
                        <div class="badge bagde-pill bg-danger text-white position-absolute" style="top: 0.10rem; right: 0.10rem">{{$b->nama_produk}}</div>
                              <h5 class="fw-bolder" style="font-family: Montserrat;"><a class="text-danger" href="{{route('umum.detailBerita',$b->id)}}">{{$b->judul_berita}}</a></h5>
                              <p style="font-size: small; font-family: Montserrat;"><i class="fa fa-calendar mr-2"></i>{{$registeredAt=$b->created_at->isoFormat('dddd, D MMMM Y')}}</p> 
                              <p class="card-text" style="font-family: Montserrat; font-size: medium; text-align: justify;">{{Str::limit($b->keterangan, 120)}}</p>
                        </div>
                        <div class="card-footer pt-0 border-top-0 bg-transparent">
                        <a href="{{route('umum.detailBerita',$b->id)}}" class="btn btn-outline-danger float-left btn-sm">Lanjut Baca &rarr;</a>
                        </div>
                        </div>
                  </div>
                  @endforeach
                  </div>
            </div>
    </section>
<style>
      .card{
      padding: .5em .5em .5em;
      border-radius: 7px;
      text-align: left;
      box-shadow: 0 5px 10px rgba(0,0,0,.2);
      }
      .card:hover{
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
      }
</style>
@stop