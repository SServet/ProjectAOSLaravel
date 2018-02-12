<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Arbeitsschein;
use App\Models\Article;
use App\Models\Orderedarticlesticket;
use App\Models\Orderedarticlesarbeitsschein;
use Illuminate\Support\Facades\DB;


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

        $ticket->lastUpdatedAt = date('Y-m-d H:i:s');
        $ticket->save();

        if($ticket->isClosed === 1){
            $t = Ticket::orderBy('lastUpdatedAt', 'DESC')->take(1)->get();
            view()->share('t', $t);
            \App::call('App\Http\Controllers\MailController@sendMailTicketClosed');

        }

        return redirect('Tickets');
    }

    public function settleTicket(Request $request){
      $ticket = Ticket::where('tid', '=', $request->get('tid'))->first();
      $ticket->settledOn = date('Y-m-d');
      if(!empty($ticket->finishedOn)){
       $ticket->isClosed = 1;
   }
   $ticket->lastUpdatedAt = date('Y-m-d H:i:s');
   $ticket->save();

   if($ticket->isClosed === 1){
    $t = Ticket::orderBy('lastUpdatedAt', 'DESC')->take(1)->get();
    view()->share('t', $t);
    \App::call('App\Http\Controllers\MailController@sendMailTicketClosed');

}

return redirect('Tickets');
}

public function submit(Request $request){
  $ticket = new Ticket;
  $artikeltabelle = new Orderedarticlesticket;
  $tableContent = $request->get('articleInfo');
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

if($ticket->finishedOn != null and $ticket->settledOn != null){
    $ticket->isClosed = 1;
}



$ticket->save();



$articleRows = explode(';',$tableContent);
     
      for($i=0; $i < count($articleRows)-1; $i++){
        $articleCell = explode(',',$articleRows[$i]);
        
        $artikeltabelle->tid = $ticket->tid;

        $artikeltabelle->artid = $articleCell[0];
        $artikeltabelle->unit = $articleCell[1];
        $artikeltabelle->count = (int)$articleCell[2];
        $artikeltabelle->save();
        $artikeltabelle = new Orderedarticlesticket;
      } 

if($ticket->isClosed === 1){
    $t = Ticket::orderBy('tid', 'DESC')->take(1)->get();
    view()->share('t', $t);
    \App::call('App\Http\Controllers\MailController@sendMailTicketClosed');

}

return redirect('Tickets');
}

public function submitEditTicket(Request $request){
  $ticket = Ticket::find($request->get('tid'));


  $ticket->tid = $request->get('tid');
  $ticket->kid = $request->get('kid');
  $ticket->mid = $request->get('mid');
  $ticket->label = $request->get('label');
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

if($ticket->finishedOn != null and $ticket->settledOn != null){
    $ticket->isClosed = 1;
}

$ticket->lastUpdatedAt = date('Y-m-d H:i:s');

$ticket->save();

if($ticket->isClosed === 1){
    $t = Ticket::orderBy('lastUpdatedAt', 'DESC')->take(1)->get();
    view()->share('t', $t);
    \App::call('App\Http\Controllers\MailController@sendMailTicketClosed');

}

return redirect('Tickets');
}


public function submitATicket(Request $request){
  $ATicket = new Arbeitsschein;
  $artikeltabelle = new Orderedarticlesarbeitsschein;
  $tableContent = $request->get('articleInfo');

  $ATicket->tid = $request->get('tid');
  $kid1 = explode(':',DB::table('ticket')->select('kid')->where('tid', $ATicket->tid)->get());
  $kid2 = explode('}',$kid1[1]);
  $ATicket->kid = $kid2[0];

  $ATicket->mid = $request->get('mid');
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

$ATicket->pid = 0;

$ATicket->save();


$articleRows = explode(';',$tableContent);

for($i=0; $i < count($articleRows)-1; $i++){
    $articleCell = explode(',',$articleRows[$i]);

    $artikeltabelle->asid = $ATicket->asid;

    $artikeltabelle->artid = $articleCell[0];
    $artikeltabelle->unit = $articleCell[1];
    $artikeltabelle->count = (int)$articleCell[2];
    $artikeltabelle->save();
    $artikeltabelle = new Orderedarticlesarbeitsschein;
}

return \App::call('App\Http\Controllers\AT_ItemController@pdfview');

return redirect('Tickets');

}


public static function addAT($tid){
 return view('atHinzufuegen');
}
}
