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
        \DB::table("artikel")->delete();
        artikel::create([
        	'artid' => '1',
        	'agid' => '6',
        	'articlename' => 'Logitech',
        	'salePrice' => 12.00,
        	'unit' => '12',
        	'mwst' => 10,
        	'description' => 'Tastatur'
        
        ]);

        
    }
}
