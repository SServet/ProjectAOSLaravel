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
		$arbeit->mid = explode('.',$request->get('mid'))[0];
		$arbeit->description = $request->get('description');
		$arbeit->ttid = explode('.',$request->get('ttid'))[0];
		$arbeit->tkid = explode('.',$request->get('tkid'))[0];
		$arbeit->dateFrom = $request->get('dateFrom');
		$arbeit->dateTo = $request->get('dateTo');
		$arbeit->timeFrom = $request->get('timeFrom');
		$arbeit->timeTo = $request->get('timeTo');
		$arbeit->billedTime = $request->get('billedTime');
		$arbeit->kulanzzeit = $request->get('kulanzzeit');
		$arbeit->kulanzgrund = $request->get('kulanzgrund');


		$arbeit->save();

		return redirect('Arbeitsschein');
	}
}
