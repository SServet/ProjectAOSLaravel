<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Projekte;
use App\Models\Artikel;


class ProjektController extends Controller
{
    //
	public function showProjekt(){
		return view('projekte');
	}

	public function showProjektHinzufuegen(){
		return view('pHinzufuegen');
	}

	public function showProjektUebersicht(){
		return view('pUebersicht');
	}

    public function closeProjekt(Request $request){
        $projekt = Projekte::where('pid', '=', $request->get('pid'))->first();
        $projekt->finishedOn = date('Y-m-d');
        $projekt->save();

        return redirect('Projekte');
    }

    public function settleProjekt(Request $request){
        $projekt = Projekte::where('pid', '=', $request->get('pid'))->first();
        $projekt->settledOn = date('Y-m-d');
        $projekt->finishedOn = date('Y-m-d');
        $projekt->save();

        return redirect('Projekte');
    }

	public function submit(Request $request){

		$projekt = new Projekte;
        $artikel = new Artikel;
        $cache;

        if(count(explode('.',$request->get('artid'))) != 1){
            $artikel->articlename = explode('.',$request->get('artid'))[1];
            $artikel->aNr = explode('.',$request->get('artid'))[0];
            $artikel->agid=14;
            $cache = explode('.',$request->get('artid'))[0];

        }
        else{
            $artikel->aNr = $request->get('aNr');
            $artikel->articlename = $request->get('artid');
            $artikel->agid=14;
            $artikel->save();
            $cache = $request->get('aNr');
            }

        $projekt->kid = explode('.',$request->get('kid'))[0];
        $projekt->mid = $request->get('mid');
        $projekt->label = $request->input('label');
        $projekt->description = $request->get('description');
        $projekt->projectType = $request->get('projectType');
        $projekt->projectVolume = $request->get('projectVolume');
        $projekt->dateOfOrder = $request->get('dateOfOrder');
        $projekt->aNr = $cache;
        $projekt->artAnz = $request->get('artAnz');
        if($request->get('finishedOn') == ''){
             $projekt->finishedOn = null;
            
        } else {
            $projekt->finishedOn = $request->get('finishedOn');
        }
        
        if( $request->get('settledOn') == ''){
            $projekt->settledOn = null;
            
        } else {
            $projekt->settledOn = $request->get('settledOn');
        }

        $projekt->save();

        return redirect('Projekte');
    }
}
