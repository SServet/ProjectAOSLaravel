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
        \DB::table("termintyp")->delete();
        termintyp::create([
        	'ttid' => '1',
        	'description' => 'Update'
        
        ]);

        termintyp::create([
            'ttid' => '2',
            'description' => 'Installation'
        
        ]);

        termintyp::create([
            'ttid' => '3',
            'description' => 'Konfiguration'
        
        ]);
        termintyp::create([
            'ttid' => '4',
            'description' => 'Vorbereitung'
        
        ]);
       
}
}
