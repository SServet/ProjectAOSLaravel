<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
