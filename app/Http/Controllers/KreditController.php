<?php

namespace App\Http\Controllers;
use App\Models\Kredit;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;

class KreditController extends Controller
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

        $kredit= Kredit::join('produk','kredit.id_produk','=','produk.id')
        ->select('kredit.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('kredit.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('kredit.index', compact('kredit','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('kredit.create', compact('produk'));
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
            'harga_mulai' => 'required',
            'dp_mulai' => 'required',
            'cicilan_mulai' => 'required',
            'tenor' => 'required',
      
            ]);
               
            $kredit = new Kredit;
            $kredit->id_produk= $request->id_produk;
            $kredit->harga_mulai = $request->harga_mulai;
            $kredit->dp_mulai = $request->dp_mulai;
            $kredit->cicilan_mulai = $request->cicilan_mulai;
            $kredit->tenor = $request->tenor;
            $kredit->save();

            return redirect()->route('kredit.index')->with('success', 'Data kredit berhasil ditambahkan');
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
    public function edit($id, Request $request)
    {
       
        $produk = Produk::all(['id','nama_produk']);

        $kredit= Kredit::findOrFail($id);
        return view('kredit.edit', compact('kredit','produk'));
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
            'harga_mulai' => 'required',
            'dp_mulai' => 'required',
            'cicilan_mulai' => 'required',
            'tenor' => 'required',
      
            ]);
               
            $kredit = Kredit::find($id);
            $kredit->id_produk= $request->id_produk;
            $kredit->harga_mulai = $request->harga_mulai;
            $kredit->dp_mulai = $request->dp_mulai;
            $kredit->cicilan_mulai = $request->cicilan_mulai;
            $kredit->tenor = $request->tenor;
            $kredit->save();

            return redirect()->route('kredit.index')->with('success', 'Data kredit berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kredit = Kredit::find($id);
        $kredit->delete();
        return redirect()->route('kredit.index')->with('message', 'Data kredit berhasil dihapus');

    }
}
