<?php

use Illuminate\Database\Seeder;
use App\Mitarbeiter as Mitarbeiter;

class MitarbeiterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Mitarbeiter")->delete();
        Mitarbeiter::create([
        	'MID' => '1',
        	'Benutzername' => 'Adi',
        	'Passwort' => '1234',
        	'Rolle' => 'Techniker',
            'Anrede' => 'Herr',
            'Vorname' => 'Enes',
            'Nachname' => 'Adiguezel',
            'Land' => 'Oesterreich',
            'PLZ' => '2700',
            'Ort' => 'Neustadt',
            'EMail' => 'i12001@student.htlwrn.ac.at',
        ]);
    }
}
