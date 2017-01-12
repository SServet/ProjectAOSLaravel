<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EinstellungenController extends Controller
{
    //
    public function showEinstellungen(){
        return view('einstellungen');
    }
}
