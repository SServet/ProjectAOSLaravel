<?php

use Illuminate\Database\Seeder;
use App\articlegroup as articlegroup;

class articlegroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("articlegroup")->delete();
        articlegroup::create([
        	'agid' => '1',
        	'description' => 'Gruppe',
        
        ]);

        articlegroup::create([
        	'agid' => '2',
        	'description' => 'Domäne',
        
        ]);

        articlegroup::create([
            'agid' => '3',
            'description' => 'Dienstleistung',
        
        ]);

        articlegroup::create([
            'agid' => '4',
            'description' => 'Registierkassa',
        
        ]);
        articlegroup::create([
            'agid' => '5',
            'description' => 'Kunden',
        
        ]);
        articlegroup::create([
            'agid' => '6',
            'description' => 'IV2013',
        
        ]);
        articlegroup::create([
            'agid' => '7',
            'description' => 'Drucker, Fax & Telefon',
        
        ]);
        articlegroup::create([
            'agid' => '8',
            'description' => 'Zahlung',
        
        ]);

        articlegroup::create([
            'agid' => '9',
            'description' => 'Exchange Online',
        
        ]);
        articlegroup::create([
            'agid' => '10',
            'description' => 'Lizenzen',
        
        ]);

        articlegroup::create([
            'agid' => '11',
            'description' => 'Zahlung',
        
        ]);
        articlegroup::create([
            'agid' => '12',
            'description' => 'Tinte & Toner',
        
        ]);
        articlegroup::create([
            'agid' => '13',
            'description' => 'Netzwerk',
        
        ]);
        articlegroup::create([
            'agid' => '14',
            'description' => 'Diverse',
        
        ]);
    }
}
