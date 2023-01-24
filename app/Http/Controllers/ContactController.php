<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact= Contact::first();
        return view('contact.create', compact('contact'));
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
            'foto_profil' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $contact = Contact::find($request->id);
            if(!empty($contact)){
                $contact->nama = $request->nama;
                $contact->telepon = $request->telepon;
                $contact->telepon2 = $request->telepon2;
                $contact->whatsapp = $request->whatsapp;
                $contact->email = $request->email;
                $contact->nama_dealer = $request->nama_dealer;
                $contact->alamat_kantor = $request->alamat_kantor;
                if($request->hasFile('foto_profil')){
                    $nama_file = time() . '.' . $request->foto_profil->getClientOriginalExtension();
    
                    $request->foto_profil->move(public_path('images/profil'), $nama_file);
    
                    $contact->foto_profil = $nama_file;
                }else{
                    $contact->foto_profil = null;
              }
            } else {
                $contact = new Contact();
                $contact->nama = $request->nama;
                $contact->telepon = $request->telepon;
                $contact->telepon2 = $request->telepon2;
                $contact->whatsapp = $request->whatsapp;
                $contact->email = $request->email;
                $contact->nama_dealer = $request->nama_dealer;
                $contact->alamat_kantor = $request->alamat_kantor;
                if($request->hasFile('foto_profil')){
                    $nama_file = time() . '.' . $request->foto_profil->getClientOriginalExtension();

                    $request->foto_profil->move(public_path('images/profil'), $nama_file);

                    $contact->foto_profil = $nama_file;
                }else{
                    $contact->foto_profil = null;
                }
            }
         
            $contact->save();
            return redirect()->route('contact.create')->with('message', 'Data contact person berhasil ditambahkan');
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
        $contact= Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
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
            'foto_profil' => 'image|nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $contact = Contact::find($id);
            $contact->nama = $request->nama;
            $contact->telepon = $request->telepon;
            $contact->telepon2 = $request->telepon2;
            $contact->whatsapp = $request->whatsapp;
            $contact->email = $request->email;
            $contact->nama_dealer = $request->nama_dealer;
            $contact->alamat_kantor = $request->alamat_kantor;
            if($request->hasFile('foto_profil')){
                $nama_file = time() . '.' . $request->foto_profil->getClientOriginalExtension();

                $request->foto_profil->move(public_path('images/profil'), $nama_file);

                $contact->foto_profil = $nama_file;
            }else{
                $contact->foto_profil = null;
            }
            
            $contact->save();
            return redirect()->route('contact.create')->with('message', 'Data contact person berhasil diupdate');
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
