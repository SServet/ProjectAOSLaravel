<?php

namespace App\Http\Controllers;

use \PDF;
use App\Http\Requests;
use App\User;
use App\Arbeitsschein;
use App\Kunden;
use App\Ticket;
use App\Termintyp;
use App\Taetigkeitsart;
use App\Article;
use Illuminate\Http\Request;

class AT_ItemController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
       // $at = Arbeitsschein::orderBy('atid', 'DESC')->take(1)->get();
        $at = Arbeitsschein::where('tid', '>', 0)->take(1)->get();
        view()->share('at',$at);        
        
        
        $tid;

        foreach ($at as $i) {
            $tid = $i->tid;
        }

        $ticket = Ticket::where('tid', $tid)->take(1)->get();
        view()->share('ticket', $ticket);

        $mid;

        foreach ($at as $i) {
            $mid = $i->mid;
        }

        $kid;

        foreach ($ticket as $i) {
            $kid = $i->kid;
        }

        $kunde = Kunden::where('kid', $kid)->take(1)->get();
        view()->share('kunde', $kunde);

        
        
        $mitarbeiter = User::where('id', $mid)->take(1)->get();
        view()->share('mitarbeiter', $mitarbeiter);
        

        $ttid;

        foreach ($at as $i) {
            $ttid = $i->ttid;
        }

        $termintyp = Termintyp::where('ttid', $ttid)->take(1)->get();
        view()->share('termintyp', $termintyp);

        $tkid;

        foreach ($at as $i) {
            $tkid = $i->tkid;
        }

        $taetigkeitsart = Taetigkeitsart::where('tkid', $tkid)->take(1)->get();
        view()->share('taetigkeitsart', $taetigkeitsart);

        $lastname;

        foreach ($mitarbeiter as $i) {
            $lastname = $i->lastname;
        }

        $artid;

        foreach ($at as $i) {
            $artid = $i->artid;
        }

        $artikel = Article::where('artid', $artid)->take(1)->get();
        view()->share('artikel', $artikel);

        $filename = 'Arbeitsschein_Ticket_'.$tid.'_'.$lastname.'_'.date('Y-m-d H:i:s').'.pdf';

       if($request->has('download')){
            $pdf = \PDF::loadView('pdfviewAT');
            //\App::call('App\Http\Controllers\MailController@sendMailArbeitsscheinTicket');
            return $pdf->download($filename);
        } 
 
        return view('pdfviewAT');
    }
}