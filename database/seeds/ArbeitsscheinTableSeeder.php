<?php

use Illuminate\Database\Seeder;
use App\Arbeitsschein as Arbeitsschein;

class ArbeitsscheinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("arbeitsschein")->delete();
        arbeitsschein::create([
        	'asid' => '1',
        	'kid' => '2',
            'mid' => '1',
            'description' => 'Login failed',
            'ttid' => '1',
            'tkid' => '2',
            'dateFrom' => '2017.01.01',
            'dateTo' => '2017.02.01',
            'timeFrom' => '20:45:00',
            'timeTo' => '21:00:00',
            'billedTime' => '3',
            'kulanzzeit' => '1',
            'kulanzgrund' => 'Keine Lust',    
        ]);
    }
}
