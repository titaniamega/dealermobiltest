<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = DB::table('users')->orderBy('id', 'DESC')->get();
        return view('akun.index', compact('akun'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun = DB::table('users')->orderBy('id', 'DESC')->get();
        return view('akun.create', compact('akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akun = new User;
        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        $akun->role = $request->role;
        $akun->save();
        activity()->log('Menambahkan data user');
        Alert::toast('Berhasil menambahkan data user', 'success');
        return redirect()->route('akun.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $akun = User::findOrFail($id);
        return view('akun.show', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('akun.edit', compact('user'));
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
        $akun = User::find($id);

        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->password = ($request->password != '' ? Hash::make($request->password) : $request->password_old);
        $akun->role = $request->role;

        $akun->save();
        activity()->log('Mengubah data user');
        Alert::toast('Berhasil update data user', 'success');
        return redirect()->route('akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = User::find($id);
        $akun->delete();
        activity()->log('Menghapus data user');

        return response()->json(['status' => 'Data akun berhasil di hapus!']);
    }
}
