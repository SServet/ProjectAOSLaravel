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
        artikel::create([
        	'aNr' => '1',
        	'agid' => '6',
        	'articlename' => 'Logitech',
        	'salePrice' => 12.00,
        	'unit' => '12',
        	'mwst' => 10,
        	'description' => 'Tastatur'
        
        ]);

        artikel::create([
        	'aNr' => '2',
        	'agid' => '4',
        	'articlename' => 'Samsung',
        	'salePrice' => 18.00,
        	'unit' => '1',
        	'mwst' => 10,
        	'description' => 'Maus'
        
        ]);
    }
}
