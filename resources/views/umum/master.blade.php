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
    </head>
        
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand" href="{{url('/umum')}}">Dealer Mobil Indonesia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/umum/')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Produk
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{url('/umum/produk/')}}">Semua Produk</a></li>
                                <div class="dropdown-divider"></div>
                                @foreach($produk as $pro)
                                    <li><a class="dropdown-item" href="{{url('#')}}">{{$pro->nama_produk}}</a></li>
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

        
        <!-- Footer-->
        <footer class="py-3 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Dealer Mobil Indonesia {{date('Y')}} All Rights Reserved</p>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('vendor/start/js/scripts.js')}}"></script>
    </body>
</html>