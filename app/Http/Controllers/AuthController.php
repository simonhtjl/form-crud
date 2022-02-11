<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Alert;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\LupaPasswordNotification;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if(Auth::user()->kategori == "Admin"){
                return redirect('/admin');
            }else if(Auth::user()->kategori == "Tamu"){
                return redirect('/user');
            }else if(Auth::user()->kategori == "Supervisi"){
                return redirect('/supervisi');
            }
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::Attempt($data,$remember_me)) {
            if(Auth::user()->kategori == "Admin"){
                return redirect('/admin');
            }else if(Auth::user()->kategori == "Tamu"){
                return redirect('/user');
            }else if(Auth::user()->kategori == "Supervisi"){
                return redirect('/supervisi');
            }
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function lupapassword(){
    
        return view('lupaPassword');
    }

    public function validasiemail(Request $request){
        $email = $request->email;

        if (User::where('email', '=', $email)->count() > 0) {
            $user = User::where('email','=',$email)->get()->first();
            $user->email = $request->email;
            $user->save();
            $user->notify(new ResetPasswordNotification($user));
            

            Alert::success('Berhasil', 'Silahkan periksa Email anda !');
            return redirect('/');
         }else{
            Alert::warning('Gagal', 'Email anda tidak terdaftar !');
            return redirect('/');
         }

    }

    public function gantipassword($id){
        $user = User::where('id',$id)->get();
        return view('passwordBaru',compact(['user']));
    }

    public function lupas(){
        return view('passwordBaru');
    }

    public function ubahpassword(Request $request,$id){
        $user = User::findOrFail($id);
        $user->password = $request->input('password');
        $user->password = $request->input('konfirmasi_password');
        $user->save();

        Alert::success('Sukses', 'Mengganti Password');
        return redirect('/');
    }
}
