<?php

namespace App\Http\Controllers;
use App\Models\Konsumen;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;

class KonsumenController extends Controller
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

        $konsumen= Konsumen::join('produk','konsumen.id_produk','=','produk.id')
        ->select('konsumen.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('konsumen.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('konsumen.index', compact('konsumen','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('konsumen.create',compact('produk'));
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
            'nama_konsumen' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      
            ]);

            $nama_file = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/konsumen'), $nama_file);
               
            $konsumen = new Konsumen;
            $konsumen->id_produk= $request->id_produk;
            $konsumen->nama_konsumen = $request->nama_konsumen;
            $konsumen->gambar = $nama_file;
            $konsumen->save();

            return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil ditambahkan');
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

        $konsumen= Konsumen::findOrFail($id);
        return view('konsumen.edit', compact('konsumen','produk'));
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
            'nama_konsumen' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      
            ]);

            if($request->hasFile('gambar')){
                $file =$request->file('gambar');
                $nama_file = $file->getClientOriginalName();
                $request->file('gambar')->move("images/konsumen", $nama_file);
                } else {
                    $nama_file=$request->gambarkonsumenlama;
                }
               
            $konsumen = Konsumen::find($id);
            $konsumen->id_produk= $request->id_produk;
            $konsumen->nama_konsumen = $request->nama_konsumen;
            $konsumen->gambar = $nama_file;
            $konsumen->save();

            return redirect()->route('konsumen.index')->with('success', 'Data konsumen berhasil diupdate');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
