<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Pengunjung;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class SupervisiController extends Controller
{
    public function index(){
        $tamu = Pengunjung::get();
        return view('Supervisi.tamu',compact(['tamu']));
    }

    public function cetakpdf($id)
    {
        $tamu = Pengunjung::where('id',$id)->get();
    	$pdf = PDF::loadview('Supervisi.tamu_pdf',['tamu'=>$tamu]);
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
