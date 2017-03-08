<?php

use Illuminate\Database\Seeder;
use App\Termintyp as Termintyp;
class TermintypTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Termintyp")->delete();
        Termintyp::create([
        	'TTID' => '1',
        	'Bezeichnung' => 'Update'
        
        ]);

        Termintyp::create([
            'TTID' => '2',
            'Bezeichnung' => 'Installation'
        
        ]);

        Termintyp::create([
            'TTID' => '3',
            'Bezeichnung' => 'Konfiguration'
        
        ]);
        Termintyp::create([
            'TTID' => '4',
            'Bezeichnung' => 'Vorbereitung'
        
        ]);
       
}
}
