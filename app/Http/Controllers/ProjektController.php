<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Arbeitsscheinprojekt;
use App\Models\Projekte;

class ProjektController extends Controller
{
    //
	public function showProjekt(){
		return view('projekte');
	}

	public function showProjektHinzufuegen(){
		return view('pHinzufuegen');
	}
    public function showAProjektHinzufuegen(){
        return view('apHinzufuegen');
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

    public function submitAProjekt(Request $request){
        $AProjekt = new Arbeitsscheinprojekt;

        $AProjekt->pid = $request->get('pid');
        $AProjekt->mid = $request->get('mid');
        $AProjekt->aNr = $request->get('aid');
        $AProjekt->description = $request->get('description');
        $AProjekt->ttid = explode('.',$request->get('ttid'))[0];
        $AProjekt->tkid = explode('.',$request->get('tkid'))[0];
        $AProjekt->dateFrom = $request->get('dateFrom');
        
        if($request->get('dateTo') == ''){
            $AProjekt->dateTo = null;            
        } else {
            $AProjekt->dateTo = $request->get('dateTo');
        }

        if($request->get('timeFrom') == ''){
           $AProjekt->timeFrom  = null;
            
        } else {
           $AProjekt->timeFrom = $request->get('timeFrom');
        }

        if($request->get('timeTo') == ''){
            $AProjekt->timeTo  = null;
            
        } else {
            $AProjekt->timeTo = $request->get('timeTo');
        }

        if($request->get('billedTime') == ''){
            $AProjekt->billedTime  = null;
            
        } else {
           $AProjekt->billedTime = $request->get('billedTime');
        }

        if($request->get('kulanzzeit') == ''){
           $AProjekt->kulanzzeit  = null;
            
        } else {
            $AProjekt->kulanzzeit = $request->get('kulanzzeit');
        }

        if($request->get('kulanzgrund') == ''){
           $AProjekt->kulanzgrund  = null;
            
        } else {
            $AProjekt->kulanzgrund = $request->get('kulanzgrund');
        } 
        if($request->get('kulanzzeit') == ''){
            $AProjekt->kulanzgrund  = null;
            
        } else {
            $AProjekt->kulanzgrund = $request->get('kulanzzeit');
        }
        $AProjekt->save();

        /* return \App::call('App\Http\Controllers\AP_ItemController@pdfview'); */

        return redirect('Projekte');

    }

	public function submit(Request $request){

		$projekt = new Projekte;

        $projekt->kid = explode('.',$request->get('kid'))[0];
        $projekt->mid = $request->get('mid');
        $projekt->label = $request->input('label');
        $projekt->description = $request->get('description');
        $projekt->projectType = $request->get('projectType');
        $projekt->projectVolume = $request->get('projectVolume');
        $projekt->dateOfOrder = $request->get('dateOfOrder');
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
