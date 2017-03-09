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
        artikelgruppe::create([
        	'agid' => '1',
        	'description' => 'Gruppe',
        
        ]);

        artikelgruppe::create([
        	'agid' => '2',
        	'description' => 'Domäne',
        
        ]);

        artikelgruppe::create([
            'agid' => '3',
            'description' => 'Dienstleistung',
        
        ]);

        artikelgruppe::create([
            'agid' => '4',
            'description' => 'Registierkassa',
        
        ]);
        artikelgruppe::create([
            'agid' => '5',
            'description' => 'Kunden',
        
        ]);
        artikelgruppe::create([
            'agid' => '6',
            'description' => 'IV2013',
        
        ]);
        artikelgruppe::create([
            'agid' => '7',
            'description' => 'Drucker, Fax & Telefon',
        
        ]);
        artikelgruppe::create([
            'agid' => '8',
            'description' => 'Zahlung',
        
        ]);

        artikelgruppe::create([
            'agid' => '9',
            'description' => 'Exchange Online',
        
        ]);
        artikelgruppe::create([
            'agid' => '10',
            'description' => 'Lizenzen',
        
        ]);

        artikelgruppe::create([
            'agid' => '11',
            'description' => 'Zahlung',
        
        ]);
        artikelgruppe::create([
            'agid' => '12',
            'description' => 'Tinte & Toner',
        
        ]);
        artikelgruppe::create([
            'agid' => '13',
            'description' => 'Netzwerk',
        
        ]);
        artikelgruppe::create([
            'agid' => '14',
            'description' => 'Diverse',
        
        ]);
    }
}
