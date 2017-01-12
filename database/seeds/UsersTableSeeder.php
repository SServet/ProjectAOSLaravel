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
        \DB::table("users")->delete();
        User::create([
        	'id' => '1',
        	'name' => 'SauTrottel',
        	'email' => 'ismiregal',
        	'password' => '1234'
        ]);
    }
}
