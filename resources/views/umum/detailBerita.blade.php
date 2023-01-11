@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Berita </h1>
            <p class="lead fw-normal text-white-50 mb-0">Berita Terbaru & Terupdate Memudahkan Anda dalam Memilih Mobil Impian Anda.</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-0">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <h1 class="display-4 fw-bolder">{{$berita->judul_berita}}</h1>
                <p class="fw-bolder text-black-100 mb-1">Posted on {{$registeredAt=$berita->created_at->isoFormat('dddd, D MMMM Y')}}</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <img src="{{url('images/berita/'.$berita->gambar_berita)}}" width="800">
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                {!! $berita->keterangan !!}
            </div>
        </section>
@stop