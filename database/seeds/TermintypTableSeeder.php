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
        	'Bezeichnung' => 'TYP 1',
        
        ]);

        Termintyp::create([
            'TTID' => '2',
            'Bezeichnung' => 'TYP 2',
        
        ]);
    }
}
