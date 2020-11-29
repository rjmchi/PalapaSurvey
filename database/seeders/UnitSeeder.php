<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(database_path("seeders/units.csv"), "r")) !== FALSE) {
            while(($unit = fgetcsv($handle,100,','))!== FALSE){
                Unit::create(["unit"=>$unit[0], "owner"=>$unit[1], "email"=>$unit[2]]);
            }
        }    
    }
}
