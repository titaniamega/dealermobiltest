<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $data['produk'] = Produk::orderBy('id','desc')->paginate(7);
        return view('produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
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
            'nama_produk' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'gambarslide' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'deskripsi' => 'required'
            ]);
        
            $nama_file = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images'), $nama_file);

            $nama_file_slide = time() . '.' . $request->gambarslide->getClientOriginalExtension();
            $request->gambarslide->move(public_path('slides'), $nama_file_slide);
        
            $produk = new Produk;
            $produk->nama_produk= $request->nama_produk;
            $produk->harga = $request->harga;
            $produk->gambar = $nama_file;
            $produk->gambarslide = $nama_file_slide;
            $produk->deskripsi = $request->deskripsi;
            $produk->save();

            return redirect()->route('produk.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
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
        'nama_produk' => 'required',
        'harga' => 'required',
        'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'gambarslide' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'deskripsi' => 'required'
        ]);

        $gambar = $request->hidden_gambar;
        if($request->gambar != '')
            {
                $nama_file = time() . '.' . $request->gambar->getClientOriginalExtension();
                $request->gambar->move(public_path('images'), $nama_file);
            }

            $produk = new Produk;
            $produk->nama_produk= $request->nama_produk;
            $produk->harga = $request->harga;
            $produk->gambar = $nama_file;
            $produk->gambarslide = $nama_file_slide;
            $produk->deskripsi = $request->deskripsi;
            $produk->save();
            return redirect()->route('produk.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findorFail($id);
        $produk->delete();
        return redirect()->route('produk.index')
        ->with('success', 'Data berhasil dihapus!');
    }

   
}
