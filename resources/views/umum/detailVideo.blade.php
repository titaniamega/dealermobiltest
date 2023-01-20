@extends('umum.master')
<x-embed-styles />
@section('content')
      <section class="py-0" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="text-center">
                <h1 class="responsive-font">{{$produkDet->nama_produk}}</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <p class="responsive-font-ex"> Beli Sekarang Disini Mobil Baru {{$produkDet->nama_produk}}, Dapatkan Promonya Hanya Disini</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="embed-responsive">
                    <x-embed url="{{$videoDet->link_video}}" aspect-ratio="16:9"/>
                    </div>
                </div>
            <div class="container px-4 px-lg-5 mt-5 responsive-font-ex">
            <p class="responsive-font-in text-danger">HARGA {{$produkDet->nama_produk}} DI KOTA INDONESIA </p>
            <p class="responsive-font-ex">Daftar Harga Mobil Baru {{$produkDet->nama_produk}}, Belum Dikurangi Cashback yang berlaku di Indonesia</p>
                    <table class="table table-hover table-bordered table-stripped" id="dataHarga" width="100%">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col" class="text-center">TIPE</th>
                        <th scope="col" class="text-center">HARGA</th>
                        <th scope="col" class="text-center">PRODUK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tipe as $key => $tipe)
                        <tr><td>{{$tipe->nama_tipe}}</td><td>@currency($tipe->harga)</td><td><strong> {{$tipe->nama_produk}}</td></tr>      
                        @endforeach
                    </tbody>
                    </table>
            <p class="responsive-font-ex">*Informasi harga diatas dapat berubah sewaktu-waktu tanpa pemberitahuan.</p>
            </div>
            <div class="container px-4 px-lg-5 mt-5 responsive-font-ex">
            <p class="responsive-font-in text-danger">SPESIFIKASI</p>
                {!! $produkDet->deskripsi !!}
            </div>
      </section>   
@stop
@section('css')
      <style>
            table th:nth-child(3), td:nth-child(3) {
            display: none;
            }
            
      </style>
@endsection