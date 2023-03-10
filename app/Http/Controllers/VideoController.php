<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
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

        $video= Video::join('produk','video.id_produk','=','produk.id')
        ->select('video.*','produk.nama_produk')
        ->where(function($query) use ($request){
            if($request->id_produk != "" )
                $query->where('video.id_produk',"=",$request->id_produk);
        })
        ->orderBy('id', 'DESC')
        ->get();

        return view('video.index', compact('video','produk','id_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all(['id','nama_produk']);
        return view('video.create', compact('produk'));
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
            'judul_video' => 'required',
            'link_video' => 'required',

            ]);

            $video= new Video;
            $video->id_produk= $request->id_produk;
            $video->judul_video = $request->judul_video;
            $video->link_video = $request->link_video;
            $video->save();

            activity()->log('Menambah data video');
            Alert::toast('Berhasil menambahkan data video', 'success');
            return redirect()->route('video.index');
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

        $video= Video::findOrFail($id);
        return view('video.show', compact('video','produk'));
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

        $video= Video::findOrFail($id);
        return view('video.edit', compact('video','produk'));
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
            'judul_video' => 'required',
            'link_video' => 'required',

            ]);

            $video = Video::find($id);
            $video->id_produk= $request->id_produk;
            $video->judul_video = $request->judul_video;
            $video->link_video = $request->link_video;
            $video->save();

            activity()->log('Mengupdate data video');
            Alert::toast('Berhasil update data video', 'success');
            return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        activity()->log('Menghapus data video');
        return response()->json(['status' => 'Data video berhasil di hapus!']);
    }

    public function updateStatus($id)
    {
        $video = Video::find($id);
        
        if ($video->is_aktif == 'ya') {
            $video->is_aktif = 'tidak';
        }else{
            $video->is_aktif = 'ya';
        }

        $video->save();
        activity()->log('Mengupdate status video');
        Alert::toast('Berhasil update status video', 'success');
        return redirect()->route('video.index');
    }
}
