<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
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

    	$artikel = new Article;

        $artikel->artid = $request->input('artid');
        $artikel->description= $request->get('description');
        $artikel->unit = $request->input('unit');
    
        if($request->input('agid') == ''){
            $artikel->agid = null;
        }else{
            $artikel->agid = explode('.',$request->input('agid'))[0];
        }    	
    	$artikel->mwst = $request->input('mwst');
        $artikel->articlename = $request->input('articlename');
    	$artikel->salePrice = $request->input('salePrice');
    	
    	$artikel->save();

    	return redirect('Einstellungen');

    }
     public function submitEditArtikel(Request $request){
  
       $artikel = Article::where('artid', $request->get('artid'))->first();         
        //fehler
        if($request->get('artid') == ''){
              $artikel->artid = null;
        } else {
            $artikel->artid = $request->input('artid');
        }

        if($request->get('articlename')== ''){
            $artikel->articlename  = null;
            
        } else {
            $artikel->articlename = $request->input('articlename');
        } 
        
        if($request->get('description')== ''){
            $artikel->description  = null;
            
        } else {
             $artikel->description = $request->input('description');   
        } 
       
        if($request->get('unit')== ''){
            $artikel->unit  = null;
            
        } else {
             $artikel->unit = $request->input('unit'); 
        } 

        if($request->input('agid') == ''){
            $artikel->agid = null;
        }else{
            $artikel->agid = explode('.',$request->input('agid'))[0];
        } 
       

        if($request->get('mwst')== ''){
            $artikel->mwst  = 0;
            
        } else {
             $artikel->mwst = $request->input('mwst');
        }

        if($request->get('salePrice')== ''){
            $artikel->salePrice = 0;
            
        } else {
            $artikel->salePrice = $request->input('salePrice');
        }
        

        $artikel->save();

        return redirect('Artikel');
    }
    
    
}