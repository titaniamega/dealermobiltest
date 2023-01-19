@extends('umum.master')
@section('content')

        <!-- Section-->
        <section class="py-5" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <h1 class="responsive-font text-center">Kontak Kami</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <div class="justify-content-center">
                <div class="row">
                @foreach($contact_person as $contact)
                    <div class="col-lg-6">
                    <div class="card-shadow">
                        <img src="{{url('images/profil/'.$contact->foto_profil)}}" class="img-fluid">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="contact-box ml-3">
                        <h1 class="font-weight-medium mt-2"><strong>{{$contact->nama}}</strong></h1>
                        <form class="mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group mt-2">
                                <h6 class="font-weight-medium responsive-font-ex">Telepon</h6>
                                <h4 class="font-weight-medium responsive-font-ex mt-2"><strong>{{$contact->telepon}}</strong></h4>
                            </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="form-group mt-2">
                                <h6 class="font-weight-medium responsive-font-ex">Telepon (Opsional)</h6>
                                <h4 class="font-weight-medium responsive-font-ex mt-2"><strong>{{$contact->telepon2}}</strong></h4>
                            </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="form-group mt-2">
                                <h6 class="font-weight-medium responsive-font-ex">Whatsapp</h6>
                                <h4 class="font-weight-medium responsive-font-ex mt-2"><strong>{{$contact->whatsaap}}</strong></h4>
                            </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="form-group mt-2">
                                <h6 class="font-weight-medium responsive-font-ex">Email</h6>
                                <h4 class="font-weight-medium responsive-font-ex mt-2"><strong>{{$contact->email}}</strong></h4>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="col-lg-12">
                <div class="card mt-4 border-0 mb-4">
                    <div class="row">
                    <div class="col-lg-6 col-md-2">
                        <div class="card-body d-flex align-items-center c-detail">
                        <div class="mr-3 align-self-center">
                            <img src="{{ url('images/icon/location.png') }}" width="80px">
                        </div>
                        <div class="">
                            <h6 class="font-weight-medium responsive-font-ex">Alamat Kantor</h6>
                            <p class="responsive-font-ex">{{$contact->alamat_kantor}}
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-2">
                        <div class="card-body d-flex align-items-center c-detail">
                        <div class="mr-3 align-self-center">
                            <img src="{{ url('images/icon/building.png') }}" width="80px">
                        </div>
                        <div class="">
                            <h6 class="font-weight-medium responsive-font-ex">Informasi Dealer</h6>
                            <p class="responsive-font-ex">{{$contact->nama_dealer}}
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach   
                </div>
            </div>
    </section>

<style>
@import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);
.contact3 {
  font-family: "Montserrat", sans-serif;
  color: #8d97ad;
  font-weight: 300;
}

.contact3 h1,
.contact3 h2,
.contact3 h3,
.contact3 h4,
.contact3 h5,
.contact3 h6 {
  color: #3e4555;
}

.contact3 .font-weight-medium {
  font-weight: 500;
}

.contact3 .card-shadow {
  -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
  box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
}

.contact3 .btn-danger-gradiant {
  background: #ff4d7e;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
  background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
  background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
}

.contact3 .btn-danger-gradiant:hover {
  background: #ff6a5b;
  background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
  background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
  background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
  background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
}
</style>
@stop