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
    public function index()
    {
        $data['tipe'] = Tipe::orderBy('id','desc')->paginate(7);
        return view('tipe.index', $data);
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
            'id_produk' => 'id_produk',
            'nama_tipe' => 'required',
            'harga' => 'required',
            'harga_automatic',
            'mimial_angsuran',
            'bayar_pertama',
            'bonus',
            ]);
               
            $tipe = new Tipe;
            $tipe->id_produk= $request->id_produk;
            $tipe->nama_tipe = $request->nama_tipe;
            $tipe->harga = $request->harga;
            $tipe->harga_automatic = $request->harga_automatic;
            $tipe->minimal_angsuran = $request->minimal_angsuran;
            $tipe->bayar_pertama = $request->bayar_pertama;
            $tipe->bonus = $request->bonus;
            $produk->save();

            return redirect()->route('tipe.index')->with('success', 'Data tipe berhasil ditambahkan');
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
