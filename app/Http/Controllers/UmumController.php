<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use BenSampo\Embed\Rules\EmbeddableUrl;
use BenSampo\Embed\Services\YouTube;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Tipe;
use App\Models\Video;
use App\Models\Promo;
use App\Models\Konsumen;
use App\Models\Berita;
use App\Models\Kredit;

class UmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $id_produk = $request->id_produk;

        $produk = Produk::all(['id','nama_produk','harga','gambar','gambarslide','deskripsi']);

        $produkindex = Produk::all(['id','nama_produk','harga','gambar','gambarslide','deskripsi'])
        ->sortByDesc('id')
        ->skip(0)
        ->take(4)
        ->all();

        $video = Video::all(['id','judul_video','link_video',]);
        $videoindex = Video::all(['id','judul_video','link_video',])
        ->sortByDesc('id')
        ->skip(0)
        ->take(3)
        ->all();

        $promo = Promo::all(['id','judul','gambar','masa_berlaku',]);
        $promoindex = Promo::all(['id','judul','gambar','masa_berlaku',])
        ->sortByDesc('id')
        ->skip(0)
        ->take(4)
        ->all();
        
        return view('umum.index',compact('produk','video','promo','produkindex','promoindex','videoindex'));
    }

    public function produk(Request $request)
    {   
        
        $produk = Produk::all(['id','nama_produk','gambar','gambarslide','harga']);

        return view('umum.produk',compact('produk'));
    }

    public function harga(Request $request)
    {   
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $tipe= Tipe::join('produk','tipe.id_produk','=','produk.id')
        ->select('tipe.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('tipe.id_produk',"=",$request->id_produk);
        })
        ->orderBy('nama_produk', 'DESC')
        ->get();

        return view('umum.harga', compact('tipe','produk','id_produk'));
    }

    public function promo(Request $request)
    {   
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $promo= Promo::join('produk','promo.id_produk','=','produk.id')
        ->select('promo.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('promo.id_produk',"=",$request->id_produk);
        })
        ->orderBy('nama_produk', 'DESC')
        ->get();

        return view('umum.promo', compact('promo','produk','id_produk'));
    }

    public function video(Request $request)
    {    
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $video= Video::join('produk','video.id_produk','=','produk.id')
        ->select('video.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('video.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('umum.video', compact('video','produk','id_produk'));
    }

    public function galeri(Request $request)
    {    
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $konsumen= Konsumen::join('produk','konsumen.id_produk','=','produk.id')
        ->select('konsumen.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('konsumen.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('umum.galeri', compact('konsumen','produk','id_produk'));
    }

    public function kredit(Request $request)
    {    
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $kredit= Kredit::join('produk','kredit.id_produk','=','produk.id')
        ->select('kredit.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('kredit.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();    

        return view('umum.kredit', compact('kredit','produk','id_produk'));
    }

    public function detailPromo($id)
    {   
        $produk = Produk::all(['id','nama_produk']);

        $promo = Promo::findOrFail($id);
        return view('umum.detailPromo', compact('promo','produk'));
    }

    public function berita(Request $request)
    {   
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $berita= Berita::join('produk','berita.id_produk','=','produk.id')
        ->select('berita.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('berita.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('umum.berita', compact('berita','produk','id_produk'));
    }

    public function detailBerita($id)
    {   
        $produk = Produk::all(['id','nama_produk']);

        $berita = Berita::findOrFail($id);
        return view('umum.detailBerita', compact('berita','produk'));
    }

    public function detailProduk($id)
    {   
        $produk = Produk::all(['id','nama_produk']);

        $produk = Produk::findOrFail($id);
        return view('umum.detailProduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
