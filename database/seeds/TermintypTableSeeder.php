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
        	'ttid' => '1',
        	'description' => 'Update'
        
        ]);

        Termintyp::create([
            'ttid' => '2',
            'description' => 'Installation'
        
        ]);

        Termintyp::create([
            'ttid' => '3',
            'description' => 'Konfiguration'
        
        ]);
        Termintyp::create([
            'ttid' => '4',
            'description' => 'Vorbereitung'
        
        ]);
       
}
}
