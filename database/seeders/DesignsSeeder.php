<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("designs")->insert([
            ["name"=>"Low Top"],
            ["name"=>"Mid Top"],
            ["name"=>"High Top"],
            ["name"=>"Road"],
            ["name"=>"Trail"],
            ["name"=>"Track"]

            
        ]);

    }
}
