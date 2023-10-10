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
            ["name"=>"Low Top","product_id"=>5],
            ["name"=>"Mid Top","product_id"=>5],
            ["name"=>"High Top","product_id"=>5],
            ["name"=>"Road","product_id"=>1],
            ["name"=>"Trail","product_id"=>1],
            ["name"=>"Track","product_id"=>1],

            
        ]);

    }
}
