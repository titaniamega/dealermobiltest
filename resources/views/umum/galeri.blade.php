@extends('umum.master')
@section('content')
        <!-- Section-->
        <section class="py-5" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <h1 class="responsive-font text-center">Galeri Konsumen</h1>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
                <div class="portfolio-item row">
                @foreach($konsumen as $k)
                    <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                    <div class="badge bagde-pill bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.10rem">{{$k->nama_produk}}</div>
                    <a href="{{url('images/konsumen/'.$k->gambar)}}" class="fancylight popup-btn" data-fancybox-group="light"> 
                    <img class="img-fluid" src="{{url('images/konsumen/'.$k->gambar)}}" alt="">
                    </a>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
@stop

@section('js')
<script>
    $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');
         	
         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
</script>
@stop

@section('css')
<style>
    body{
	margin:0;
	padding:0;
}
/* .container{
	width:90%
	margin:10px auto;
} */
.portfolio-menu{
	text-align:center;
}
.portfolio-menu ul li{
	display:inline-block;
	margin:0;
	list-style:none;
	padding:10px 15px;
	cursor:pointer;
	-webkit-transition:all 05s ease;
	-moz-transition:all 05s ease;
	-ms-transition:all 05s ease;
	-o-transition:all 05s ease;
	transition:all .5s ease;
}

.portfolio-item{
	/*width:100%;*/
}
.portfolio-item .item{
	/*width:303px;*/
	float:left;
	margin-bottom:10px;
}
</style>
@stop