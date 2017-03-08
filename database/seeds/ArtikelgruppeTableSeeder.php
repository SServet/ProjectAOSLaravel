<?php

use Illuminate\Database\Seeder;
use App\Artikelgruppe as Artikelgruppe;

class ArtikelgruppeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Artikelgruppe")->delete();
        Artikelgruppe::create([
        	'AgID' => '1',
        	'Bezeichnung' => 'Gruppe',
        
        ]);

        Artikelgruppe::create([
        	'AgID' => '2',
        	'Bezeichnung' => 'Domäne',
        
        ]);

        Artikelgruppe::create([
            'AgID' => '3',
            'Bezeichnung' => 'Dienstleistung',
        
        ]);

        Artikelgruppe::create([
            'AgID' => '4',
            'Bezeichnung' => 'Registierkassa',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '5',
            'Bezeichnung' => 'Kunden',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '6',
            'Bezeichnung' => 'IV2013',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '7',
            'Bezeichnung' => 'Drucker, Fax & Telefon',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '8',
            'Bezeichnung' => 'Zahlung',
        
        ]);

        Artikelgruppe::create([
            'AgID' => '9',
            'Bezeichnung' => 'Exchange Online',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '10',
            'Bezeichnung' => 'Lizenzen',
        
        ]);

        Artikelgruppe::create([
            'AgID' => '11',
            'Bezeichnung' => 'Zahlung',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '12',
            'Bezeichnung' => 'Tinte & Toner',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '13',
            'Bezeichnung' => 'Netzwerk',
        
        ]);
        Artikelgruppe::create([
            'AgID' => '14',
            'Bezeichnung' => 'Diverse',
        
        ]);
    }
}
