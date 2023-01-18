<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Dealer Indonesia</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('vendor/adminlte/dist/css/adminlte.css')}}" rel="stylesheet" />
           <!-- Load google API -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
        function initialize() {
        var options = {
            center:new google.maps.LatLng(-6.9147444,107.6098111), // longitude latitude bandung
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP // Tipe ROADMAP
        };
        // create map object
        var map=new google.maps.Map(document.getElementById("googleMap"),options);
        }
        // membuat Event Listener untuk memanggil fungsi initialize pada saat halaman selesai di load
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/rowgroup/1.3.0/css/rowGroup.bootstrap4.min.css" rel="stylesheet" />
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
        @yield('css')
    </head>
        
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #ff0000;">
            <div class="container-fluid px-4 px-lg-5 responsive-font-ex">
                <a class="navbar-brand" href="{{url('/umum')}}">Dealer Mobil Indonesia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Produk
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('/umum/produk/')}}">Semua Produk</a></li>
                                <div class="dropdown-divider"></div>
                                @foreach($produk as $pro)
                                    <li><a class="dropdown-item" href="#">{{$pro->nama_produk}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/harga')}}">Harga</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/promo')}}">Promo</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/berita')}}">Berita</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/kredit')}}">Kredit</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/video')}}">Video</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/galeri')}}">Galeri</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/umum/kontak')}}">Kontak</a>
                            </li>
                        </ul>
                      
                    </div>
                </div>
            </div>
        </nav>
    <body>
        @yield('content')
            <!-- Footer -->
            <footer class="text-center text-lg-start text-white responsive-font-ex" style="background-color: #1c2331">
            <section class="d-flex justify-content-between"> </section>

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">TENTANG KAMI</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #ff0000; height: 2px"
                        />
                    <p>
                    Pembelian Mobil Baru Toyota Area Pemasaran Solo Dan Sekitarnya. 
                    Melayani Informasi Harga OTR Mobil Toyota Solo Terbaru, 
                    Program Promo Terbaru Toyota Solo, Syarat Kredit, Paket Kredit Hemat Toyota Solo 
                    </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">MENU</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #ff0000; height: 2px"
                        />
                    <p>
                        <a href="{{url('/umum/produk')}}" class="text-white">Produk</a>
                    </p>
                    <p>
                        <a href="{{url('/umum/harga')}}" class="text-white">Harga</a>
                    </p>
                    <p>
                        <a href="{{url('/umum/promo')}}" class="text-white">Promo</a>
                    </p>
                    <p>
                        <a href="{{url('/umum/berita')}}" class="text-white">Berita</a>
                    </p>
                    <p>
                        <a href="{{url('/umum/video')}}" class="text-white">Video</a>
                    </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">LOKASI</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #ff0000; height: 2px"
                        />
                       
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Kontak Kami</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #ff0000; height: 2px"
                        />
                    <p><i class="fas fa-home mr-3"></i> Indonesia</p>
                    <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                    &copy; {{date('Y')}} Copyright :
                    <a class="text-white" href="#">Dealer Mobil Indonesia | All Rights Reserved</a>
            </div>
            <!-- Copyright -->
            </footer>
            <!-- Footer -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('vendor/start/js/scripts.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.3.0/js/dataTables.rowGroup.min.js"></script>
        @yield('js')
    </body>

</html>