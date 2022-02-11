<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengunjung;
use App\Notifications\ResetPasswordNotification;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;
use Alert;


class AdminController extends Controller
{
    public function index(){
        $user = User::get();
        
        return view('Admin.akun',compact(['user']));
    }

    public function tambahAkun(Request $request){
        $email = $request->email;

        if(User::where('email', '=', $email)->count() > 0){
            Alert::warning('Gagal', 'Email ini sudah terdaftar !');
            return redirect()->back();
        }else{
            $user = User::create(request(['kategori','nama','email','password']));

            $user->notify(new ResetPasswordNotification($user));
            Alert::success('Sukses', 'Menambahkan akun');
            return redirect()->back();
        }
    }

 
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        Alert::success('Sukses', 'Menghapus akun');
        return redirect()->back();
    }

    public function indexTamu(){
        $tamu = Pengunjung::get();
        return view('Admin.tamu',compact(['tamu']));
    }

    public function cetakpdf($id)
    {
        $tamu = Pengunjung::where('id',$id)->get();
    	$pdf = PDF::loadview('Admin.tamu_pdf',['tamu'=>$tamu]);
    	return $pdf->stream();
    }
    public function cetakdocs($id){
        $tamu = Pengunjung::findOrFail($id);
        $template = new TemplateProcessor('word-template/user.docx');
        $template->setValue('nama',$tamu->nama);
        $template->setValue('usia',$tamu->usia);
        $template->setValue('alamat',$tamu->alamat);
        $template->setValue('notel',$tamu->notel);
        $template->setValue('pekerjaan',$tamu->pekerjaan);
        $template->setValue('sumberinfo',$tamu->sumberinfo);
        $template->setValue('kritiksaran',$tamu->kritiksaran);
        $template->setImageValue('gambar', '../public/gambar/'.$tamu->gambar);
        $fileName = $tamu->nama;
        $template->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
