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
                <h1  class="responsive-font">{{$promo->judul}}</h1>
                <p class="fw-bolder text-black-100 mb-1">Posted on {{$registeredAt=$promo->created_at->isoFormat('dddd, D MMMM Y')}}</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <img src="{{url('images/promo/'.$promo->gambar)}}" width="800" class="img-fluid">
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5 responsive-font-ex">
                {!! $promo->keterangan !!}
            </div>
        </section>
        <style>
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
    font-size: 20px;
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