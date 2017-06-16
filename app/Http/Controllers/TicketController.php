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

	public function showTicketEdit(){
		return view('tEdit');
	}

	public function closeTicket(Request $request){
		$ticket = Ticket::where('tid', '=', $request->get('tid'))->first();
		$ticket->finishedOn = date('Y-m-d');
		if(!empty($ticket->settledOn)){
			$ticket->isClosed = 1;
		}
		$ticket->save();

		return redirect('Tickets');
	}

	public function settleTicket(Request $request){
		$ticket = Ticket::where('tid', '=', $request->get('tid'))->first();
		$ticket->settledOn = date('Y-m-d');
		if(!empty($ticket->finishedOn)){
			$ticket->isClosed = 1;
		}
		$ticket->save();

		return redirect('Tickets');
	}

	public function submit(Request $request){
		$ticket = new Ticket;


		$ticket->kid = explode('.',$request->get('kid'))[0];
		$ticket->mid = $request->get('mid');
        $ticket->label = $request->input('label');
		$ticket->description = $request->get('description');
		$ticket->creationDate = $request->get('creationDate');

		if($request->get('finishedOn') == ''){
            $ticket->finishedOn = null;
            
        } else {
            $ticket->finishedOn = $request->get('finishedOn');
        }
        
        if( $request->get('settledOn') == ''){
            $ticket->settledOn = null;
            
        } else {
            $ticket->settledOn = $request->get('settledOn');
        }


		$ticket->save();

		return redirect('Tickets');
	}

		public function submitEditTicket(Request $request){
		$ticket = Ticket::find($request->get('tid'));
		$ticket->delete();
		$ticket = new Ticket;

		$ticket->tid = $request->get('tid');
		$ticket->kid = $request->get('kid');
		$ticket->mid = $request->get('mid');
        $ticket->label = $request->input('label');
		$ticket->description = $request->get('description');
		$ticket->creationDate = $request->get('creationDate');

		if($request->get('finishedOn') == ''){
            $ticket->finishedOn = null;
            
        } else {
            $ticket->finishedOn = $request->get('finishedOn');
        }
        
        if( $request->get('settledOn') == ''){
            $ticket->settledOn = null;
            
        } else {
            $ticket->settledOn = $request->get('settledOn');
        }


		$ticket->save();

		return redirect('Tickets');
	}


	public function submitATicket(Request $request){
		$ATicket = new Arbeitsscheinticket;

		$ATicket->tid = $request->get('tid');
		$ATicket->mid = $request->get('mid');
		$ATicket->aNr = $request->get('aid');
		$ATicket->description = $request->get('description');
		$ATicket->ttid = explode('.',$request->get('ttid'))[0];
		$ATicket->tkid = explode('.',$request->get('tkid'))[0];
		$ATicket->dateFrom = $request->get('dateFrom');
		

		
		if($request->get('dateTo') == ''){
            $ATicket->dateTo = null;            
        } else {
            $ATicket->dateTo = $request->get('dateTo');
        }

		if($request->get('timeFrom') == ''){
           $ATicket->timeFrom  = null;
            
        } else {
           $ATicket->timeFrom = $request->get('timeFrom');
        }

        if($request->get('timeTo') == ''){
            $ATicket->timeTo  = null;
            
        } else {
            $ATicket->timeTo = $request->get('timeTo');
        }

        if($request->get('billedTime') == ''){
            $ATicket->billedTime  = null;
            
        } else {
           $ATicket->billedTime = $request->get('billedTime');
        }

        if($request->get('kulanzzeit') == ''){
           $ATicket->kulanzzeit  = null;
            
        } else {
            $ATicket->kulanzzeit = $request->get('kulanzzeit');
        }

        if($request->get('kulanzgrund') == ''){
           $ATicket->kulanzgrund  = null;
            
        } else {
            $ATicket->kulanzgrund = $request->get('kulanzgrund');
        } 
        if($request->get('kulanzzeit') == ''){
            $ATicket->kulanzgrund  = null;
            
        } else {
            $ATicket->kulanzgrund = $request->get('kulanzzeit');
        }
		$ATicket->save();

		return \App::call('App\Http\Controllers\AT_ItemController@pdfview');

		return redirect('Tickets');

	}


	public static function addAT($tid){
	    return view('atHinzufuegen');
	}
}
