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
            <h4 class="mb-4">Ketik dibawah ini untuk mencari</h4>
                <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Cari" aria-label="Search" />
                </div>
            </div>

            <div class="container px-4 px-lg-5 mt-5">
                    <div class="table-responsive">
                    <!--Table-->
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col" class="text-center">TIPE</th>
                        <th scope="col" class="text-center">HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $id = null;
                        for($i=0;$i<sizeof($tipe);){
                        if($tipe[$i]->id_produk == $id){
                            echo "<tr><td>". $tipe[$i]->nama_tipe."</td><td>". $tipe[$i]->harga."</td></tr>" ;
                            $i++;
                        }elseif($tipe[$i]->id_produk != $id){
                            $id = $tipe[$i]->id_produk;
                            echo "<tr><td class='table-active' colspan='2'> <strong> ". $tipe[$i]->nama_produk."</td></tr>" ;
                        }
                        }
                    @endphp
                        </tbody>
                    </table>
                    <!--Table-->

                    </div>
                    
                </div>
            </div>

        </section>

            
        
@stop