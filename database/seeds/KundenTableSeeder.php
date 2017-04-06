<?php

use Illuminate\Database\Seeder;
use App\Kunden as Kunden;

class KundenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table("kunden")->delete();
        kunden::create([        	
        	'salutation' => 'Herr',
        	'title' => 'Dr',
        	'firstname' => 'Marko',
            'lastname' => 'Peric',
            'companyname' => 'GMBH',
            'email' => 'i12015@student.htlwrn.ac.at',
            'country' => 'Peric',
            'plz' => '2700',
            'city' => 'Neustadt',
            'street' => 'Hauptstrase 12',            
            'telephone' => '067664689761',
            'mobilephone' =>' ',
            'fax' => ' ',
            'web' => ' ',
            'UIDNumber' => ' ',
            'taxID' => '1234'
        ]);

         kunden::create([            
            'salutation' => 'Herr',
            'title' => 'Dr',
            'firstname' => 'Servet',
            'lastname' => 'Simsek',
            'companyname' => 'GMBH',
            'email' => 'i120455@student.htlwrn.ac.at',
            'country' => 'Neustadt',
            'plz' => '2700',
            'city' => 'Neustadt',
            'street' => 'Hauptstrase 12',            
            'telephone' => '0676654659761',
            'mobilephone' =>' ',
            'fax' => ' ',
            'web' => ' ',
            'UIDNumber' => ' ',
            'taxID' => '7894'
        ]);
    }
}
