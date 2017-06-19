<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbeitsschein;
use App\Models\Artikel;

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

    public function closeArbeitsschein(Request $request){
        $arbeitsschein = Arbeitsschein::where('asid', '=', $request->get('asid'))->first();
        $arbeitsschein->dateTo = date('Y-m-d');
        $arbeitsschein->timeTo = date('H:i:s');
        $arbeitsschein->save();

        return redirect('Arbeitsschein');
    }

	public function submit(Request $request){
		$arbeit = new Arbeitsschein;
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

		$arbeit->kid = explode('.',$request->get('kid'))[0];
		$arbeit->mid = $request->get('mid');
		$arbeit->description = $request->get('description');
		$arbeit->ttid = explode('.',$request->get('ttid'))[0];
		$arbeit->tkid = explode('.',$request->get('tkid'))[0];
		$arbeit->dateFrom = $request->get('dateFrom');
        $arbeit->aNr = $cache;
        $arbeit->artAnz = $request->get('artAnz');

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
