<?php

use Illuminate\Database\Seeder;
use App\User as User;

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
        user::create([
            'id' => '1',
        	'firstname' => 'Marco',
            'lastname' => 'Hajek',
            'email' => 'admin@marco-hajek.me',
            'password' => bcrypt('test'),
            'isAdmin' => 1,
            'salutation' => 'Herr',
            'title' => '',
            'country' => 'Oesterreich',
            'plz' => '2700',
            'city' => 'Wiener Neustadt',
            'address' => 'Doktor Eckenergasse 25'
        ]);

        user::create([
            'id' => '2',
            'firstname' => 'Enes',
            'lastname' => 'Adiguezel',
            'email' => 'i12001@student.htlwrn.ac.at',
            'password' => bcrypt('adi'),
            'isAdmin' => 0,
            'salutation' => 'Herr',
            'title' => '',
            'country' => 'Oesterreich',
            'plz' => '2700',
            'city' => 'Wiener Neustadt',
            'address' => 'Doktor Eckenergasse 25'
        ]);
    }
}
