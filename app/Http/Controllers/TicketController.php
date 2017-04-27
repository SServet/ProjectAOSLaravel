<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Arbeitsscheinticket;
use Illuminate\Support\Facades\Redirect;


class TicketController extends Controller
{
    //
	public function showTicket(){
		return view('tickets');
	}

	public function showTicketHinzufuegen(){
		return view('tHinzufuegen');
	}

	public function showATicketHinzufuegen(){
		return view('atHinzufuegen');
	}
	public function showTicketUebersicht(){
		return view('tUebersicht');
	}

	public function closeTicket(Request $request){
		$ticket = Ticket::where('tid', '=', $request->get('tid'))->first();
		$ticket->isClosed = 1;
		$ticket->save();

		return redirect('Tickets');
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


	public function submitATicket(Request $request){
		$ATicket = new Arbeitsscheinticket;

		$ATicket->tid = $request->get('tid');
		$ATicket->mid = explode('.',$request->get('mid'))[0];
		$ATicket->aNr = $request->get('aid');
		$ATicket->description = $request->get('description');
		$ATicket->ttid = explode('.',$request->get('ttid'))[0];
		$ATicket->tkid = explode('.',$request->get('tkid'))[0];
		$ATicket->dateFrom = $request->get('dateFrom');
		$ATicket->dateTo = $request->get('dateTo');
		$ATicket->timeFrom = $request->get('timeFrom');
		$ATicket->timeTo = $request->get('timeTo');;
		$ATicket->billedTime = $request->get('billedTime');
		$ATicket->kulanzgrund = $request->get('kulanzgrund');
		$ATicket->kulanzzeit = $request->get('kulanzzeit');

		$ATicket->save();

		return redirect('Tickets');

	}


	public static function addAT($tid){
	    return view('atHinzufuegen');
	}
}
