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
        	'Bezeichnung' => 'Tastaturen',
        
        ]);

        Artikelgruppe::create([
        	'AgID' => '2',
        	'Bezeichnung' => 'Mäuse',
        
        ]);
    }
}
