@extends('umum.master')
@section('content')     
        <!-- Section-->
        <section class="py-0" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <h1 class="responsive-font">{{$berita->judul_berita}}</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <p class="fw-bolder text-black-100 mb-1">Posted on {{$registeredAt=$berita->updated_at->isoFormat('dddd, D MMMM Y')}}</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <img src="{{url('images/berita/'.$berita->gambar_berita)}}" width="800" class="img-fluid">
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5 responsive-font-ex">
                {!! $berita->keterangan !!}
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