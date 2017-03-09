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
        \DB::table("taetigkeitsart")->delete();
        taetigkeitsart::create([
        	'tkid' => '1',
        	'description' => 'Fernwartung'
        
        ]);

        taetigkeitsart::create([
            'tkid' => '2',
            'description' => 'Vor Ort'
        
        ]);
         taetigkeitsart::create([
            'tkid' => '3',
            'description' => 'SSIT-Technik'
        
        ]);
    }
}
