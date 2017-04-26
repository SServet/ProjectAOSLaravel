<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitarbeiterController extends Controller
{
    public function showMitarbeiterAnlegen(){
        return view('mitarbeiter_anlegen');
    }

    public function submit(){
    	
    }
}