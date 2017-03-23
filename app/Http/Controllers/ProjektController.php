<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

	public function showProjektUebersicht(){
		return view('pUebersicht');
	}

	public function submit(Request $request){

		$projekt = new Projekte;

        $projekt->kid = explode('.',$request->get('kid'))[0];
        $projekt->mid = explode('.',$request->get('mid'))[0];
        $projekt->label = $request->input('label');
        $projekt->description = $request->get('description');
        $projekt->projectType = $request->get('projectType');
        $projekt->projectVolume = $request->get('projectVolume');
        $projekt->dateOfOrder = $request->get('dateOfOrder');
        $projekt->finishedOn = $request->get('finishedOn');
        $projekt->settledOn = $request->get('settledOn');

        echo $projekt->save();
    }
}
