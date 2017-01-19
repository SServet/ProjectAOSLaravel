<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
