<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;
use DataTables;
use App\Helpers\Uang;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mobils'] = Mobil::orderBy('id','desc')->paginate(7);
        return view('mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
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
            'merk_mobil' => 'required',
            'tipe_mobil' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'deskripsi' => 'required'
            ]);

            $nama_file = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images'), $nama_file);

            $mobil = new Mobil;
            $mobil->merk_mobil = $request->merk_mobil;
            $mobil->tipe_mobil = $request->tipe_mobil;
            $mobil->harga = $request->harga;
            $mobil->gambar = $nama_file;
            $mobil->deskripsi = $request->deskripsi;
            $mobil->save();

            return redirect()->route('mobil.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mobil.show',compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
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
        'merk_mobil' => 'required',
        'tipe_mobil' => 'required',
        'harga' => 'required',
        ]);
        $mobil = Mobil::find($id);
        $mobil->merk_mobil = $request->merk_mobil;
        $mobil->tipe_mobil = $request->tipe_mobil;
        $mobil->harga = $request->harga;
        $mobil->save();
        return redirect()->route('mobil.index')
        ->with('Mobil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findorFail($id);
        $mobil->delete();
        return redirect()->route('mobil.index')
        ->with('success', 'Data berhasil dihapus!');
    }

    public function getKliping()
    {
        $data = KlipingModel::select('*')
                ->join('tb_kat_berita', 'tb_kliping.id_kat_berita', '=', 'tb_kat_berita.id_kat_berita')
                ->where('tb_kliping.id_stat_kliping', 2)
                ->limit(100)
                ->get();
        return DataTables::of($data)->make(true);
    }
}
