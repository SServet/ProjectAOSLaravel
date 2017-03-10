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
        \DB::table("mitarbeiter")->delete();
        user::create([
            'id' => '1',
        	'firstname' => 'Süleyman',
            'lastname' => 'Sari',
            'email' => 's.sari@ssit.at',
            'password' => bcrypt('ssit'),
            'isAdmin' => 1,
            'salutation' => 'Herr',
            'title' => '',
            'country' => 'Oesterreich',
            'plz' => '2630',
            'city' => 'Ternitz',
            'address' => 'Dr. Karl Renner Straße 91/o/3'
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
