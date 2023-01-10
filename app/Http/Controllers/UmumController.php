<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Tipe;
use App\Models\Video;


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
        $video = Video::all(['id','judul_video','link_video',]);
        
        return view('umum.index',compact('produk','video'));
    }

    public function produk()
    {   
        $produk = DB::table('produk')->get();

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

    public function promo()
    {   
        $promo = DB::table('promo')->get();
        
        return view('umum.promo',compact('promo'));
    }
    public function video()
    {   
        $video = DB::table('video')->get();
        
        return view('umum.video',compact('video'));
    }
    public function galeri()
    {   
        $galeri = DB::table('konsumen')->get();
        
        return view('umum.galeri',compact('galeri'));
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
