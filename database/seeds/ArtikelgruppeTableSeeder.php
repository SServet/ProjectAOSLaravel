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
        \DB::table("artikelgruppe")->delete();
        Artikelgruppe::create([
        	'agid' => '1',
        	'description' => 'Gruppe',
        
        ]);

        Artikelgruppe::create([
        	'agid' => '2',
        	'description' => 'Domäne',
        
        ]);

        Artikelgruppe::create([
            'agid' => '3',
            'description' => 'Dienstleistung',
        
        ]);

        Artikelgruppe::create([
            'agid' => '4',
            'description' => 'Registierkassa',
        
        ]);
        Artikelgruppe::create([
            'agid' => '5',
            'description' => 'Kunden',
        
        ]);
        Artikelgruppe::create([
            'agid' => '6',
            'description' => 'IV2013',
        
        ]);
        Artikelgruppe::create([
            'agid' => '7',
            'description' => 'Drucker, Fax & Telefon',
        
        ]);
        Artikelgruppe::create([
            'agid' => '8',
            'description' => 'Zahlung',
        
        ]);

        Artikelgruppe::create([
            'agid' => '9',
            'description' => 'Exchange Online',
        
        ]);
        Artikelgruppe::create([
            'agid' => '10',
            'description' => 'Lizenzen',
        
        ]);

        Artikelgruppe::create([
            'agid' => '11',
            'description' => 'Zahlung',
        
        ]);
        Artikelgruppe::create([
            'agid' => '12',
            'description' => 'Tinte & Toner',
        
        ]);
        Artikelgruppe::create([
            'agid' => '13',
            'description' => 'Netzwerk',
        
        ]);
        Artikelgruppe::create([
            'agid' => '14',
            'description' => 'Diverse',
        
        ]);
    }
}
