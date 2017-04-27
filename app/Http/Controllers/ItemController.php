<?php

namespace App\Http\Controllers;

use \PDF;
use App\Http\Requests;
use App\Arbeitsschein;
use App\User;
use App\Kunden;
use App\Termintyp;
use App\Taetigkeitsart;
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


       if($request->has('download')){
            $pdf = \PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }
}