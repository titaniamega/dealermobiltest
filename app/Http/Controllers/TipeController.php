<?php

namespace App\Http\Controllers;
use App\Models\Tipe;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;

class TipeController extends Controller
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

        $tipe= Tipe::join('produk','tipe.id_produk','=','produk.id')
        ->select('tipe.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('tipe.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('tipe.index', compact('tipe','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('tipe.create', compact('produk'));
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
            'nama_tipe' => 'required',
            'harga' => 'required',
      
            ]);
               
            $tipe = new Tipe;
            $tipe->id_produk= $request->id_produk;
            $tipe->nama_tipe = $request->nama_tipe;
            $tipe->harga = $request->harga;
            $tipe->harga_automatic = $request->harga_automatic;
            $tipe->minimal_angsuran = $request->minimal_angsuran;
            $tipe->bayar_pertama = $request->bayar_pertama;
            $tipe->bonus = $request->bonus;
            $tipe->save();

            return redirect()->route('tipe.index')->with('message', 'Data tipe berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::all(['id','nama_produk']);

        $tipe= Tipe::findOrFail($id);
        return view('tipe.show', compact('tipe','produk'));
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

        $tipe= Tipe::findOrFail($id);
        return view('tipe.edit', compact('tipe','produk'));
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
            'nama_tipe' => 'required',
            'harga' => 'required',
      
            ]);
               
            $tipe = Tipe::find($id);
            $tipe->id_produk= $request->id_produk;
            $tipe->nama_tipe = $request->nama_tipe;
            $tipe->harga = $request->harga;
            $tipe->harga_automatic = $request->harga_automatic;
            $tipe->minimal_angsuran = $request->minimal_angsuran;
            $tipe->bayar_pertama = $request->bayar_pertama;
            $tipe->bonus = $request->bonus;
            $tipe->save();

            return redirect()->route('tipe.index')->with('message', 'Data tipe berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipe = Tipe::find($id);
        $tipe->delete();
        
        return redirect()->route('kredit.index')->with('message', 'Data tipe berhasil dihapus');
    }
}
