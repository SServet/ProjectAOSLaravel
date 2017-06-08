<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Artikel;
use App\Kunden;
use App\Termintyp;
use DB;
use Excel;

class EinstellungenController extends Controller
{
    //
    public function showEinstellungen(){
        return view('einstellungen');
    }

    public function ttAnlegen(Request $request){
    	$tt = new Termintyp;

    	$tt->description = $request->TName;
    	$tt->save();

    	return redirect("Einstellungen");
    }

    public function ttUmbenennen(Request $request){
    	Termintyp::where('ttid', explode('.', $request->get('TUmbenennen'))[0])->update(array('description' => $request->get('neueBez')));

    	return redirect("Einstellungen");
    }

    public function ttLoeschen(Request $request){
    	Termintyp::where('ttid',explode('.',$request->get('TLoeschen'))[0])->delete();

    	return redirect("Einstellungen");
    }

     public function ALoeschen(Request $request){
    	Artikel::where('aNr',explode('.',$request->get('ALoeschen'))[0])->delete();

    	return redirect("Einstellungen");
    }

	public function exportArtikeltoCSV($type)
	{
		$data = artikel::get()->toArray();
		return Excel::create('ArtikelExport', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function exportKundentoCSV($type)
	{
		$data = kunden::get()->toArray();
		return Excel::create('KundenExport', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importArtikelfromCSV(Request $request)
	{

		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $v) {

					if(!empty($v)){		
							//$insert[] = ['aNr' => $v['artikelnummer'], 'description' => $v['beschreibung'], 'unit' => $v['einheit'], 'agid' => $v['agid'], 'mwst' => $v['mwst'], 'articlename' => $v['name'], 'saleprice' => $v['verkaufspreis']];
							//$artikel = Artikel::where('aNr', $v['anr'])->take(1)->get();

								$insert[] = ['aNr' => $v['anr'], 'description' => $v['description'], 'unit' => $v['unit'], 'agid' => $v['agid'], 'mwst' => $v['mwst'], 'articlename' => $v['articlename'], 'saleprice' => $v['saleprice']];
								if(!empty($insert)){
						
								DB::table('artikel')->insert($insert);
							}

							
							
							$insert= array();

					}
		
				}
				echo '<script>alert("Artikel erfolgreich eingefügt!");
						window.location.href = "Einstellungen";
						</script>';	
			
	
				
			}

		}

	}



	public function importKundenfromCsv(Request $request)
	{
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $v) {
					
					if(!empty($v)){
		
						$insert[] = ['kid' => $v['kid'], 'salutation' => $v['salutation'], 'title' => $v['title'], 'firstname' => $v['firstname'], 'lastname' => $v['lastname'],'companyname' => $v['companyname'],'country'  => $v['country'], 'plz'  => $v['plz'], 'city'  => $v['city'], 'street' => $v['street'], 'email'  => $v['email'],'telephone'  => $v['telephone'],'mobilephone' => $v['mobilephone'],'fax'  => $v['fax'],'web'  => $v['web'],'UIDNumber'  => $v['uidnumber'],'taxID'  => $v['taxid']];

						//$insert[] = ['kid' => $v['kid'], 'salutation' => $v['anrede'], 'title' => $v['titel'], 'firstname' => $v['vorname'], 'lastname' => $v['nachname'],'companyname' => $v['firmenname'],'country'  => $v['land'], 'plz'  => $v['plz'], 'city'  => $v['ort'], 'street' => $v['strasse'], 'email'  => $v['email'],'telephone'  => $v['telefon'],'mobilephone' => $v['mobil'],'fax'  => $v['fax'],'web'  => $v['web'],'UIDNumber'  => $v['uidnummer'],'taxID'  => $v['steuernummer']];


							if(!empty($insert)){
						
								DB::table('kunden')->insert($insert);
							}
							$insert= array();

						
					}
				}
				echo '<script>alert("Kunden erfolgreich eingefügt!");
						window.location.href = "Einstellungen";
						</script>';	
				
				
			}


		}
			
	}
}