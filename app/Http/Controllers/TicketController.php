<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

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

	public function submit(Request $request){
		$ticket = new Ticket;


		$ticket->kid = explode('.',$request->get('kid'))[0];
		$ticket->mid = explode('.',$request->get('mid'))[0];
        $ticket->label = $request->input('label');
		$ticket->description = $request->get('description');
		$ticket->creationDate = $request->get('creationDate');
		$ticket->finishedOn =$request->get('finishedOn');
		$ticket->settledOn = $request->get('settledOn');


		$ticket->save();

		return redirect('Tickets');
	}
}
