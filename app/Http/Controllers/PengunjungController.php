<?php

namespace App\Http\Controllers;
use App\Models\Pengunjung;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Alert;

class PengunjungController extends Controller
{
    public function index()
    {
        $user = User::get();
        $tamu = Pengunjung::get();
        return view('User.index',compact(['user','tamu']));
    }

    public function store(Request $request ){
        $this->validate($request,[
            'nama' =>'required',
            'usia'=> 'required',
            'alamat' => 'required',
            'notel' => 'required',
            'pekerjaan'=> 'required',
            'sumberinfo'=> 'required',
            'kritiksaran' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'marketing' => 'required',
        ]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('gambar'), $imgName);

        $tamu = new Pengunjung;
        $tamu->nama = $request->nama;
        $tamu->usia = $request->usia;
        $tamu->alamat = $request->alamat;
        $tamu->notel = $request->notel;
        $tamu->pekerjaan = $request->pekerjaan;
        $tamu->sumberinfo = $request->sumberinfo;
        $tamu->kritiksaran = $request->kritiksaran;
        $tamu->gambar = $imgName;
        $tamu->marketing = $request->marketing;
        $tamu->save();

        Alert::success('Sukses', 'Mengisi Form');
        return redirect()->back();

    }
}
