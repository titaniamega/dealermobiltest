@extends('umum.master')
@section('content')
      <!-- Header-->
      <x-embed-styles />   
        
        <!-- Section-->
        <section class="py-4" style="padding-top : 64px !important">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="justify-content-center">
                <h3 class="responsive-font text-center">Persyaratan Kredit Mobil Baru</h3>
                <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #7c4dff; height: 2px"/>
                </div>
                <p style="text-align: justify;" class="responsive-font-in"><strong>Persyaratan Kredit Untuk Perorangan &nbsp;:</strong></p>
                    <ol style="text-align: justify;" class="responsive-font-ex">
                        <li>Foto Copy Kartu Keluarga</li>
                        <li>Foto Copy KTP ( Suami + Istri )</li>
                        <li>Foto Copy PBB/ Akta Jual Beli Rumah</li>
                        <li>Foto Copy Tabungan / Rekening Koran 3 Bulan Terakhir</li>
                        <li>Foto Copy SIUP &amp; NPWP (Wiraswasta) atau Slip Gaji</li>
                        <li>Surat Keterangan Kerja ( Karyawan )</li>
                    </ol>
                <p style="text-align: justify;" class="responsive-font-in"><strong>Persyaratan Kredit Untuk Perusahaan  &nbsp;:</strong></p>
                    <ol style="text-align: justify;" class="responsive-font-ex">
                        <li>Foto copy rekening koran</li>
                        <li>Foto copy Domisili perusahaan</li>
                        <li>Foto copy NPWP</li>
                        <li>Foto copy SIUP &amp; TDP</li>
                        <li>Foto copy Akte Perusahaan</li>
                        <li>Foto copy KTP direksi</li>
                    </ol>
                <p style="text-align: justify;" class="responsive-font-ex"><strong>NB: Semua persyaratan kredit baik perorangan atau perusahaan dapat berubah sewaktu-waktu tergantung kebijakan masing-masing Leasing.</strong></p>        
            </div>
                    </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-center">
                        <a class="btn btn-primary" href="#" role="button">Simulasi Kredit</a>
                    </div>
        </section>
<style>
@media (min-width: 1200px) {
  .responsive-font {
    font-size: 40px;
    font-family: "Montserrat", sans-serif !important;
  }
}
/* If the screen size is smaller than 1200px, set the font-size to 80px */
@media (max-width: 1199.98px) {
  .responsive-font {
    font-size: 35px;
    font-family: "Montserrat", sans-serif !important;
  }
}
@media (min-width: 1200px) {
  .responsive-font-ex {
    font-size: 15px;
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
@stop