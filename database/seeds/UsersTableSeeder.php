<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("Mitarbeiter")->delete();
        User::create([
        	'MID' => '1',
        	'Benutzername' => 'Adi',
        	'Passwort' => '1234',
        	'Rolle' => 'Techniker',
            'Anrede' => 'Herr',
            'Vorname' => 'Enes',
            'Nachname' => 'Adigüzel',
            'Land' => 'Österreich',
            'PLZ' => '2700',
            'Ort' => 'Neustadt',
            'EMail' => 'i12001@student.htlwrn.ac.at',
        ]);
    }
}
