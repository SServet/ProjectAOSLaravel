<?php

use Illuminate\Database\Seeder;
use App\Artikel as Artikel;

class ArtikelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Artikel")->delete();
        Artikel::create([
        	'ANr' => '1',
        	'AgID' => '23',
        	'Artikelname' => 'Logitech',
        	'Verkaufspreis' => 12.00,
        	'Einheit' => '12',
        	'Mwst' => 10,
        	'Bezeichnung' => 'Tastatur'
        
        ]);

        Artikel::create([
        	'ANr' => '2',
        	'AgID' => '4',
        	'Artikelname' => 'Samsung',
        	'Verkaufspreis' => 18.00,
        	'Einheit' => '1',
        	'Mwst' => 10,
        	'Bezeichnung' => 'Maus'
        
        ]);
    }
}
