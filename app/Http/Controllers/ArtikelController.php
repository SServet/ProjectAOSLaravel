<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
class ArtikelController extends Controller
{
    public function showArtikelAnlegen(){
        return view('artikel_anlegen');
    }

    public function showArtikel(){
        return view('artikel');
    }

    public function showArtikelEdit(){
        return view('artEdit');
    }

    public function submit(Request $request){

    	$artikel = new Artikel;

        $artikel->aNr = $request->input('aNr');
        $artikel->description= $request->get('description');
        $artikel->unit = $request->input('unit');
    
    	$artikel->agid = explode('.',$request->input('agid'))[0];
    	$artikel->mwst = $request->input('mwst');
        $artikel->articlename = $request->input('articlename');
    	$artikel->salePrice = $request->input('salePrice');
    	
    	$artikel->save();

    	return redirect('Einstellungen');

    }
     public function submitEditArtikel(Request $request){
        $artikel = Artikel::find($request->get('aNr'));
        //fehler
        $artikel->aNr = $request->get('aNr');
        $artikel->articlename = $request->get('articlename');
        $artikel->description = $request->get('description');   
        $artikel->unit = $request->get('unit');    
        $artikel->agid = explode('.',$request->get('agid'))[0];
        $artikel->mwst = $request->get('mwst');
        $artikel->salePrice = $request->get('salePrice');
        $artikel->save();

        return redirect('artikel');
    }
    
}