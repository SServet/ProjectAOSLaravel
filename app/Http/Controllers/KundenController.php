<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunden;
class KundenController extends Controller
{
    public function showKundeAnlegen(){
        return view('kunde_anlegen');
    }

    public function submit(Request $request){
    	$kunde = new Kunden;


        $kunde->salutation = $request->get('artidede');
        $kunde->title = $request->input('titel');
    	$kunde->firstname = $request->input('vorname');
    	$kunde->lastname = $request->input('nachname');
        $kunde->companyname = $request->input('firmenname');
    	$kunde->email = $request->input('email');
    	$kunde->country = $request->input('land');
    	$kunde->plz = $request->input('plz');
    	$kunde->city = $request->input('stadt');
    	$kunde->street = $request->input('strasse');
    	$kunde->telephone = $request->input('telefonnumer');
    	$kunde->mobilephone = $request->input('handynummer');
    	$kunde->fax = $request->input('fax');
    	$kunde->web = $request->input('web');
        $kunde->UIDNumber = $request->input('uid');
        $kunde->taxID = $request->input('tax');

    	$kunde->save();

    	return redirect('Einstellungen');

    }
}