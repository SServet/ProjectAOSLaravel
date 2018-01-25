<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MitarbeiterTableSeeder::class);
        $this->call(KundenTableSeeder::class);
        $this->call(articlegroupTableSeeder::class);
        $this->call(TaetigkeitsartTableSeeder::class);
        $this->call(TermintypTableSeeder::class);
    }  
}
