<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
	public function showTicket(){
		return view('tickets');
	}

	public function showTicketHinzufuegen(){
		return view('tHinzufuegen');
	}

	public function showTicketUebersicht(){
		return view('tUebersicht');
	}
}
