@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Promo </h1>
            <p class="lead fw-normal text-white-50 mb-0">Lihat Promo Mobil Terbaru yang Dapat Membantu & Memudahkan Anda dalam Memilih Mobil Impian Anda.</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-0">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <h1 class="display-4 fw-bolder">{{$promo->judul}}</h1>
                <p class="fw-bolder text-black-100 mb-1">Posted on {{$registeredAt=$promo->created_at->isoFormat('dddd, D MMMM Y')}}</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <img src="{{url('images/promo/'.$promo->gambar)}}" width="800">
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                {!! $promo->keterangan !!}
            </div>
        </section>
@stop