<?php

namespace App\Http\Controllers;
use App\Models\Promo;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_produk = $request->id_produk;
        $produk = Produk::all(['id','nama_produk']);

        $promo= Promo::join('produk','promo.id_produk','=','produk.id')
        ->select('promo.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('promo.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('promo.index', compact('promo','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('promo.create',compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      
            ]);

            $nama_file = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/promo'), $nama_file);
               
            $promo = new Promo;
            $promo->id_produk= $request->id_produk;
            $promo->judul = $request->judul;
            $promo->gambar = $nama_file;
            $promo->keterangan = $request->keterangan;
            $promo->masa_berlaku = $request->masa_berlaku;
            $promo->save();

            activity()->log('Menambah data promo');

            return redirect()->route('promo.index')->with('message', 'Data promo berhasil ditambahkan');
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
        $produk = Produk::all(['id','nama_produk']);

        $promo= Promo::findOrFail($id);
        return view('promo.edit', compact('promo','produk'));
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
        $request->validate([
            'id_produk' => 'required|exists:produk,id',
            'judul' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      
            ]);

            if($request->hasFile('gambar')){
                $file =$request->file('gambar');
                $nama_file = $file->getClientOriginalName();
                $request->file('gambar')->move("images/promo", $nama_file);
                } else {
                    $nama_file=$request->gambarpromolama;
                }
               
            $promo = Promo::find($id);
            $promo->id_produk= $request->id_produk;
            $promo->judul = $request->judul;
            $promo->gambar = $nama_file;
            $promo->keterangan = $request->keterangan;
            $promo->masa_berlaku = $request->masa_berlaku;
            $promo->save();

            activity()->log('Mengupdate data promo');
            return redirect()->route('promo.index')->with('message', 'Data promo berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();
        activity()->log('Menghapus data promo');
        return response()->json(['status' => 'Data promo berhasil di hapus!']);
    }
}
