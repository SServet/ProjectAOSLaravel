<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitarbeiter;
class MitarbeiterController extends Controller
{
    public function showMitarbeiterAnlegen(){
        return view('mitarbeiter_anlegen');
    }

    public function showMitarbeiterUebersicht_Bearbeiten(){
        return view('mitarbeiterUebersicht_Bearbeiten');
    }

    public function showMitarbeiterEdit(){
        return view('mEdit');
    }

    public function submit(Request $request){
    	$mitarbeiter = new Mitarbeiter;

    	$mitarbeiter->firstname = $request->input('vorname');
    	$mitarbeiter->lastname = $request->input('nachname');
    	$mitarbeiter->email = $request->input('email');
    	$mitarbeiter->password = bcrypt($request->input('pw'));

    	$isAdmin = $request->get('isAdmin');

    	if($isAdmin == 'Ja'){
    		$mitarbeiter->isAdmin = 1;
    	}else{
    		$mitarbeiter->isAdmin = 0;
    	}

    	$mitarbeiter->salutation = $request->get('anrede');
    	$mitarbeiter->title = $request->input('titel');
    	$mitarbeiter->country = $request->input('land');
    	$mitarbeiter->plz = $request->input('plz');
    	$mitarbeiter->city = $request->input('stadt');
    	$mitarbeiter->address = $request->input('adresse');
    	$mitarbeiter->telphone = $request->input('telefonnumer');
    	$mitarbeiter->mobilephone = $request->input('handynummer');
    	$mitarbeiter->fax = $request->input('fax');
    	$mitarbeiter->web = $request->input('web');

    	$mitarbeiter->save();

    	return redirect('Einstellungen');

    }

    public function submitEditMitarbeiter(Request $request){
        $mitarbeiter = Mitarbeiter::find($request->get('mid'));
        $mitarbeiter->id = $request->get('mid');
        $mitarbeiter->salutation = $request->get('anrede');
        $mitarbeiter->firstname = $request->get('firstname');
        $mitarbeiter->lastname = $request->get('lastname');
        $mitarbeiter->email = $request->input('email');
        $pw = $request->input('pw');
        if($pw != $mitarbeiter->password){
            $mitarbeiter->password = bcrypt($request->input('pw'));
        }else{
            $mitarbeiter->password = $mitarbeiter->password;
        }

        $isAdmin = $request->get('isAdmin');

        if($isAdmin == 'Ja'){
            $mitarbeiter->isAdmin = 1;
        }else{
            $mitarbeiter->isAdmin = 0;
        }

        $mitarbeiter->salutation = $request->get('anrede');
        $mitarbeiter->title = $request->input('titel');
        $mitarbeiter->country = $request->input('land');
        $mitarbeiter->plz = $request->input('plz');
        $mitarbeiter->city = $request->input('stadt');
        $mitarbeiter->address = $request->input('adresse');
        $mitarbeiter->telphone = $request->input('telefonnumer');
        $mitarbeiter->mobilephone = $request->input('handynummer');
        $mitarbeiter->fax = $request->input('fax');
        $mitarbeiter->web = $request->input('web');

        $mitarbeiter->save();

        return redirect('Einstellungen');

    }

}