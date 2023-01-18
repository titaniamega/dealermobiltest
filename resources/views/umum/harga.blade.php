@extends('umum.master')
@section('content')   
        <!-- Section-->
        <section class="py-3" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
            <h1 class="responsive-font text-center">Daftar Harga Mobil</h1>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #ff0000; height: 2px"/>
            <p class="responsive-font-ex">Lihat dan Cek Price List Daftar Harga Mobil Semua Tipe Terbaru Terbaik Sesuai Pilihan Anda berlaku  {{date('M Y')}} </p>
            <p class="responsive-font-ex">* Harga Sewaktu waktu Dapat Berubah Tanpa Pemberitahuan Sebelumnya.</p> 
            <h4 class="responsive-font-in">Ketik di bawah ini untuk mencari</h4>
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