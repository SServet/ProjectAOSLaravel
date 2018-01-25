<?php

namespace App\Http\Controllers;

use \PDF;
use App\Http\Requests;
use App\Arbeitsschein;
use App\User;
use App\Kunden;
use App\Termintyp;
use App\Taetigkeitsart;
use App\Article;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $arbeitsscheine = Arbeitsschein::orderBy('asid', 'DESC')->take(1)->get();
        view()->share('arbeitsscheine',$arbeitsscheine);        
        
        
        $mid;

        foreach ($arbeitsscheine as $i) {
            $mid = $i->mid;
        }

        
        
        $mitarbeiter = User::where('id', $mid)->take(1)->get();
        view()->share('mitarbeiter', $mitarbeiter);

        
        $kid;

        foreach ($arbeitsscheine as $i) {
            $kid = $i->kid;
        }
        
        $kunde = Kunden::where('kid', $kid)->take(1)->get();
        view()->share('kunde', $kunde);
        

        $ttid;

        foreach ($arbeitsscheine as $i) {
            $ttid = $i->ttid;
        }

        $termintyp = Termintyp::where('ttid', $ttid)->take(1)->get();
        view()->share('termintyp', $termintyp);

        $tkid;

        foreach ($arbeitsscheine as $i) {
            $tkid = $i->tkid;
        }

        $taetigkeitsart = Taetigkeitsart::where('tkid', $tkid)->take(1)->get();
        view()->share('taetigkeitsart', $taetigkeitsart);

        $artId;

        foreach ($arbeitsscheine as $i) {
            $artId = $i->artid;
        }

        $artikel = Article::where('artid', $artId)->take(1)->get();
        view()->share('artikel', $artikel);

       if($request->has('download')){
            $pdf = \PDF::loadView('pdfview');
            \App::call('App\Http\Controllers\MailController@sendMailArbeitsschein');
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }

    public function pdfview_laterClosed(Request $request)
    {
        $arbeitsscheine = Arbeitsschein::orderBy('dateTo', 'DESC')->take(1)->get();
        view()->share('arbeitsscheine',$arbeitsscheine);        
        
        
        $mid;

        foreach ($arbeitsscheine as $i) {
            $mid = $i->mid;
        }

        
        
        $mitarbeiter = User::where('id', $mid)->take(1)->get();
        view()->share('mitarbeiter', $mitarbeiter);

        
        $kid;

        foreach ($arbeitsscheine as $i) {
            $kid = $i->kid;
        }
        
        $kunde = Kunden::where('kid', $kid)->take(1)->get();
        view()->share('kunde', $kunde);
        

        $ttid;

        foreach ($arbeitsscheine as $i) {
            $ttid = $i->ttid;
        }

        $termintyp = Termintyp::where('ttid', $ttid)->take(1)->get();
        view()->share('termintyp', $termintyp);

        $tkid;

        foreach ($arbeitsscheine as $i) {
            $tkid = $i->tkid;
        }

        $taetigkeitsart = Taetigkeitsart::where('tkid', $tkid)->take(1)->get();
        view()->share('taetigkeitsart', $taetigkeitsart);

        $artId;

        foreach ($arbeitsscheine as $i) {
            $artId = $i->artid;
        }

        $artikel = Artikel::where('artid', $artId)->take(1)->get();
        view()->shate('artikel', $artikel);

       if($request->has('download')){
            $pdf = \PDF::loadView('pdfview');
            \App::call('App\Http\Controllers\MailController@sendMail');
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }


}