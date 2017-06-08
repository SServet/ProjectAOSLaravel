<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
class ArtikelController extends Controller
{
    public function showArtikelAnlegen(){
        return view('artikel_anlegen');
    }

     public function showArtikelBearbeiten(){
        return view('artikel_bearbeiten');
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

    //Bearbeiten
    public function bearbeiten(Request $request){

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
}