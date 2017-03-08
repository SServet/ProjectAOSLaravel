<?php

use Illuminate\Database\Seeder;
use App\Taetigkeitsart as Taetigkeitsart;

class TaetigkeitsartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Taetigkeitsart")->delete();
        Taetigkeitsart::create([
        	'TKID' => '1',
        	'Bezeichnung' => 'Fernwartung'
        
        ]);

        Taetigkeitsart::create([
            'TKID' => '2',
            'Bezeichnung' => 'Vor Ort'
        
        ]);
         Taetigkeitsart::create([
            'TKID' => '3',
            'Bezeichnung' => 'SSIT-Technik'
        
        ]);
    }
}
