@extends('umum.master')
@section('content')
      <section class="py-0" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <h1 class="responsive-font">{{$produk->nama_produk}}</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <p class="responsive-font-ex"> </p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <img src="{{url('images/'.$produk->gambar)}}" width="800" class="img-fluid">
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5 responsive-font-ex">
                {!! $produk->deskripsi !!}
            </div>
      </section>   
@stop