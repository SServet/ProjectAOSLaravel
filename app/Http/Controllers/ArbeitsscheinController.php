<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbeitsschein;

class ArbeitsscheinController extends Controller
{
	public function showArbeitsschein(){
		return view('arbeitsschein');
	}

	public function showArbeitsscheinHinzufuegen(){
		return view('aHinzufuegen');
	}

	public function showArbeitsscheinUebersicht(){
		return view('aUebersicht');
	}

	public function submit(Request $request){
		$arbeit = new Arbeitsschein;


		$arbeit->kid = explode('.',$request->get('kid'))[0];
		$arbeit->mid = $request->get('mid');
		$arbeit->description = $request->get('description');
		$arbeit->ttid = explode('.',$request->get('ttid'))[0];
		$arbeit->tkid = explode('.',$request->get('tkid'))[0];
		$arbeit->dateFrom = $request->get('dateFrom');


		if($request->get('dateTo') == ''){
            $arbeit->dateTo = null;            
        } else {
            $arbeit->dateTo = $request->get('dateTo');
        }

		if($request->get('timeFrom') == ''){
            $arbeit->timeFrom  = null;
            
        } else {
            $arbeit->timeFrom = $request->get('timeFrom');
        }

        if($request->get('timeTo') == ''){
            $arbeit->timeTo  = null;
            
        } else {
            $arbeit->timeTo = $request->get('timeTo');
        }

        if($request->get('billedTime') == ''){
            $arbeit->billedTime  = null;
            
        } else {
            $arbeit->billedTime = $request->get('billedTime');
        }

        if($request->get('kulanzzeit') == ''){
            $arbeit->kulanzzeit  = null;
            
        } else {
            $arbeit->kulanzzeit = $request->get('kulanzzeit');
        }

        if($request->get('kulanzgrund') == ''){
            $arbeit->kulanzgrund  = null;
            
        } else {
            $arbeit->kulanzgrund = $request->get('kulanzgrund');
        }


		$arbeit->save();

		return \App::call('App\Http\Controllers\ItemController@pdfview');

		return redirect('Arbeitsschein');
	}
}
