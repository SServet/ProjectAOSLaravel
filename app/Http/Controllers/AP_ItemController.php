<?php

namespace App\Http\Controllers;

use \PDF;
use App\Http\Requests;
use App\User;
use App\Arbeitsscheinprojekt;
use App\Kunden;
use App\Projekt;
use App\Termintyp;
use App\Taetigkeitsart;
use App\Artikel;
use Illuminate\Http\Request;

class AP_ItemController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $ap = Arbeitsscheinprojekt::orderBy('apid', 'DESC')->take(1)->get();
        view()->share('ap',$ap);        
        
        
        $pid;

        foreach ($ap as $i) {
            $pid = $i->pid;
        }

        $projekt = Projekt::where('pid', $pid)->take(1)->get();
        view()->share('projekt', $projekt);

        $mid;

        foreach ($ap as $i) {
            $mid = $i->mid;
        }

        $kid;

        foreach ($projekt as $i) {
            $kid = $i->kid;
        }

        $kunde = Kunden::where('kid', $kid)->take(1)->get();
        view()->share('kunde', $kunde);

        
        
        $mitarbeiter = User::where('id', $mid)->take(1)->get();
        view()->share('mitarbeiter', $mitarbeiter);
        

        $ttid;

        foreach ($ap as $i) {
            $ttid = $i->ttid;
        }

        $termintyp = Termintyp::where('ttid', $ttid)->take(1)->get();
        view()->share('termintyp', $termintyp);

        $tkid;

        foreach ($ap as $i) {
            $tkid = $i->tkid;
        }

        $taetigkeitsart = Taetigkeitsart::where('tkid', $tkid)->take(1)->get();
        view()->share('taetigkeitsart', $taetigkeitsart);

        $lastname;

        foreach ($mitarbeiter as $i) {
            $lastname = $i->lastname;
        }

        $artid;

        foreach ($ap as $i) {
            $artid = $i->artid;
        }

        $artikel = Artikel::where('artid', $artid)->take(1)->get();
        view()->share('artikel', $artikel);

        $filename = 'Arbeitsschein_Projekt_'.$pid.'_'.$lastname.'_'.date('Y-m-d H:i:s').'.pdf';

       if($request->has('download')){
            $pdf = \PDF::loadView('pdfviewAP');
            \App::call('App\Http\Controllers\MailController@sendMailArbeitsscheinProjekt');
            return $pdf->download($filename);
        }

        return view('pdfviewAP');
    }
}