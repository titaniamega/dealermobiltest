<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;

class BeritaController extends Controller
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

        $berita= Berita::join('produk','berita.id_produk','=','produk.id')
        ->select('berita.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('berita.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('berita.index', compact('berita','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('berita.create', compact('produk'));
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
            'judul_berita' => 'required',
            'gambar_berita' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);

            $nama_file = time() . '.' . $request->gambar_berita->getClientOriginalExtension();
            $request->gambar_berita->move(public_path('images/berita'), $nama_file);
               
            $berita = new Berita;
            $berita->id_produk= $request->id_produk;
            $berita->judul_berita = $request->judul_berita;
            $berita->gambar_berita = $nama_file;
            $berita->keterangan = $request->keterangan;
            $berita->save();

            return redirect()->route('berita.index')->with('message', 'Data berita berhasil ditambahkan');
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

        $berita= Berita::findOrFail($id);
        return view('berita.show', compact('berita','produk'));
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

        $berita= Berita::findOrFail($id);
        return view('berita.edit', compact('berita','produk'));
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
            'judul_berita' => 'required',
            'gambar_berita' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);

            if($request->hasFile('gambar_berita')){
                $file =$request->file('gambar_berita');
                $nama_file = $file->getClientOriginalName();
                $request->file('gambar_berita')->move("images/berita", $nama_file);
                } else {
                    $nama_file=$request->gambarberitalama;
                }
               
            $berita = Berita::find($id);
            $berita->id_produk= $request->id_produk;
            $berita->judul_berita = $request->judul_berita;
            $berita->gambar_berita = $nama_file;
            $berita->keterangan = $request->keterangan;
            $berita->save();

            return redirect()->route('berita.index')->with('message', 'Data berita berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return redirect()->route('berita.index')->with('message', 'Data berita berhasil dihapus');
    }
}
