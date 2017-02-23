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
        	'Bezeichnung' => 'Tätigkeit 1',
        
        ]);

        Taetigkeitsart::create([
            'TKID' => '2',
            'Bezeichnung' => 'Tätigkeit 2',
        
        ]);
    }
}
