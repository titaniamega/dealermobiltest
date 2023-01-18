@extends('umum.master')
@section('content')   
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="responsive-font text-center">{{$promo->judul}}</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #7c4dff; height: 2px"/>
                <p class="responsive-font-ex text-center">Posted on {{$registeredAt=$promo->created_at->isoFormat('dddd, D MMMM Y')}} | Berlaku sampai : {{$promo->masa_berlaku?->isoFormat('dddd, D MMMM Y')}}</p>
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
@stop