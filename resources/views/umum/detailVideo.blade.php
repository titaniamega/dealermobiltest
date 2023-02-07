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
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="justify-content-center">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="card-shadow">
                            <img src="{{url('images/'.$produkDet->gambar)}}" class="img-fluid" width="500px">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <h3><span class="badge float-right badge-pill badge-danger">{{$total_tipe}} TIPE</span></h3>
                        <p style="text-align: justify;" class="responsive-font-in"><strong>{{$produkDet->nama_produk}} INDONESIA</strong></p>
                        <p style="text-align: justify;" class="responsive-font-ex">Beli Sekarang Disini Mobil {{$produkDet->nama_produk}}, Dapatkan Promonya Dibawah Ini</p>
                        <div class="responsive-font-ex">
                        <dl class="row">
                        @foreach($produkTipe as $tp)
                            <dt class="col-4">Harga Mulai</dt>
                            <dd class="col-8">@currency($tp->harga) Jutaan</dd>
                            <dt class="col-4">DP Mulai </dt>
                            <dd class="col-8">@currency($tp->dp_mulai) Jutaan</dd>
                            <dt class="col-4">Cicilan Mulai </dt>
                            <dd class="col-8">@currency($tp->cicilan_mulai) Jutaan</dd>
                            <dt class="col-4">Tenor Hingga </dt>
                            <dd class="col-8">{{$tp->tenor}} Tahun</dd>
                            <dt class="col-4">Bonus </dt>
                            <dd class="col-8">{{$tp->bonus}}</dd>
                        </dl>
                        @endforeach
                        </div>
                        </div>
                    </div> 
                </div>   
            </div>
            
            <div class="container px-4 px-lg-5 mt-3 responsive-font-ex">
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
                        @foreach($tipe as $key => $t)
                        <tr><td>{{$t->nama_tipe}}</td><td>@currency($t->harga)</td><td><strong> {{$t->nama_produk}}</td></tr>      
                        @endforeach
                    </tbody>
                    </table>
            <p class="responsive-font-ex">*Informasi harga diatas dapat berubah sewaktu-waktu tanpa pemberitahuan.</p>
            </div>
            <div class="container px-4 px-lg-5 mt-3 responsive-font-ex">
            <p class="responsive-font-in text-danger">SPESIFIKASI</p>
                {!! $produkDet->deskripsi !!}
            </div>

            <div class="container px-4 px-lg-5 mt-3 mb-5">
            <p class="responsive-font-in text-danger">VIDEO LAINNYA</p>
                <div class="justify-content-center">
                    <div class="row">
                        @foreach($videolainnya as $v)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{$v->nama_produk}}</div>
                                    <x-embed url="{{$v->link_video}}" />                      
                                    <div class="card-body p-1">
                                    <div class="text-center">                                 
                                        <h5 class="fw-bolder"><a class="text-danger responsive-font-ex" href="{{route('umum.detailVideo',$v->id)}}">{{$v->judul_video}}</a></h5>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            
            </div>
      </section>

@stop
@section('css')
      <style>
            table th:nth-child(3), td:nth-child(3) {
            display: none;
            }
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
@endsection