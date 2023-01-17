@extends('umum.master')
@section('content')
      <!-- Header-->
      <header class="bg-dark py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Daftar Harga Mobil</h1>
            <p class="lead fw-normal text-white-50 mb-0">Lihat dan Cek Price List Daftar Harga Mobil Semua Tipe Terbaru Terbaik Sesuai Pilihan Anda berlaku  {{date('M Y')}}</p>
            </div>
        </header>     
        <!-- Section-->
        <section class="py-3">
            <div class="container px-4 px-lg-5 mt-5">
            <h4 class="mb-4">Ketik di bawah ini untuk mencari</h4>
                <div class="form-outline">
                <input type="search" id="btn-search" class="form-control" placeholder="Cari" aria-label="Search" />
                </div>
            </div>

            <div class="container px-4 px-lg-5 mt-5">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped" id="dataHarga">
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
                    </div>  
                </div>
            </div>
        </section>
@stop
@section('js')
        <script>
           $(document).ready(function() {
                var table = $('#dataHarga').DataTable( {
                    order: [[2, 'asc']],
                    rowGroup: {
                        dataSrc: 2
                    },
                    "bPaginate": false,
                    "bInfo": false,
                } );
                $('.dataTables_filter').hide();
                $('#btn-search').on( 'keyup', function () {
                        table.search(this.value, true, false, true).draw();
                    
                    });
            } );
        </script>
@stop

@section('css')
        <style>
            table th:nth-child(3), td:nth-child(3) {
            display: none;
            }
        </style>
@endsection