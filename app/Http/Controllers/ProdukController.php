<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $produk= Produk::orderBy('created_at','desc')->get();
        return view('produk.index', compact('produk'));
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

            activity()->log('Menambah data produk');
            Alert::toast('Berhasil menambahkan data produk', 'success');
            return redirect()->route('produk.index');
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
        'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'gambarslide' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'deskripsi' => 'required'
        ]);

        if($request->hasFile('gambar')){
            $file    =$request->file('gambar');
            $nama_file = $file->getClientOriginalName();
            $request->file('gambar')->move("images/", $nama_file);
            } else {
                $nama_file=$request->gambarlama;
            }
        
        if($request->hasFile('gambarslide')){
            $file    =$request->file('gambarslide');
            $nama_file_slide = $file->getClientOriginalName();
            $request->file('gambarslide')->move("slides/", $nama_file_slide);
            } else {
                $nama_file_slide=$request->gambarslidelama;
            }

            $produk = Produk::find($id);
            $produk->nama_produk= $request->nama_produk;
            $produk->harga = $request->harga;
            $produk->gambar = $nama_file;
            $produk->gambarslide = $nama_file_slide;
            $produk->deskripsi = $request->deskripsi;
            $produk->save();

            activity()->log('Mengupdate data produk');
            Alert::toast('Berhasil update data produk', 'success');
            return redirect()->route('produk.index');
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
        activity()->log('Menghapus data produk');
        return response()->json(['status' => 'Data produk berhasil di hapus!']);
    }
}
