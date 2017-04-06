<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Artikel;
use App\Kunden;
use DB;
use Excel;

class EinstellungenController extends Controller
{
    //
    public function showEinstellungen(){
        return view('einstellungen');
    }

	public function exportArtikeltoCSV($type)
	{
		$data = Artikel::get()->toArray();
		return Excel::create('ArtikelExport', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function exportKundentoCSV($type)
	{
		$data = Kunden::get()->toArray();
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
					print_r(array_values($data->toArray() ));
					if(!empty($v)){
		
							//$insert[] = ['aNr' => $v['artikelnummer'], 'description' => $v['beschreibung'], 'unit' => $v['einheit'], 'agid' => $v['agid'], 'mwst' => $v['mwst'], 'articlename' => $v['name'], 'saleprice' => $v['verkaufspreis']];

							$insert[] = ['aNr' => $v['anr'], 'description' => $v['description'], 'unit' => $v['unit'], 'agid' => $v['agid'], 'mwst' => $v['mwst'], 'articlename' => $v['articlename'], 'saleprice' => $v['saleprice']];

							
							if(!empty($insert)){
						
								DB::table('Artikel')->insert($insert);
							}
							$insert= array();

						
					}
				}

				
				
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
					print_r(array_values($data->toArray() ));
					if(!empty($v)){
		
						$insert[] = ['kid' => $v['kid'], 'salutation' => $v['salutation'], 'title' => $v['title'], 'firstname' => $v['firstname'], 'lastname' => $v['lastname'],'companyname' => $v['companyname'],'country'  => $v['country'], 'plz'  => $v['plz'], 'city'  => $v['city'], 'street' => $v['street'], 'email'  => $v['email'],'telephone'  => $v['telephone'],'mobilephone' => $v['mobilephone'],'fax'  => $v['fax'],'web'  => $v['web'],'UIDNumber'  => $v['uidnumber'],'taxID'  => $v['taxid']];

						//$insert[] = ['kid' => $v['kid'], 'salutation' => $v['anrede'], 'title' => $v['titel'], 'firstname' => $v['vorname'], 'lastname' => $v['nachname'],'companyname' => $v['firmenname'],'country'  => $v['land'], 'plz'  => $v['plz'], 'city'  => $v['ort'], 'street' => $v['strasse'], 'email'  => $v['email'],'telephone'  => $v['telefon'],'mobilephone' => $v['mobil'],'fax'  => $v['fax'],'web'  => $v['web'],'UIDNumber'  => $v['uidnummer'],'taxID'  => $v['steuernummer']];


							if(!empty($insert)){
						
								DB::table('Kunden')->insert($insert);
							}
							$insert= array();

						
					}
				}

				
				
			}

		}
			
	}
}
