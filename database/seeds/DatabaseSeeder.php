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
        $this->call(KundenTableSeeder::class);
        $this->call(TermintypTableSeeder::class);
        $this->call(TaetigkeitsartTableSeeder::class);
        $this->call(ArtikelgruppeTableSeeder::class);
        $this->call(ArtikelTableSeeder::class);
        $this->call(MitarbeiterTableSeeder::class);
      }  
}
