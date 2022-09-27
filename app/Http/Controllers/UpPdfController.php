<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpPdfController extends Controller
{
    public function mform(){
        return view('up_pdf.index');
    }

    public function mguardar(Request $request){
        if($request->hasFile("urlpdf")){
            $file=$request->file("urlpdf");

            $nombre = "pdf_".time().".".$file->guessExtension();

            $ruta = public_path("pdf/".$nombre);

            if($file->guessExtension()=="pdf"){
                copy($file, $ruta);
            }else{
                dd("NO ES UN PDF");
            }



        }
    }
}
