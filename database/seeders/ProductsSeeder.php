<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("products")->insert([
            ["name"=>"Nike Air Force 1 '07",
            "type_product_id"=>8,
            "gender_id"=>2],
            ["name"=>"Nike Dunk Low Retro",
            "type_product_id"=>8,
            "gender_id"=>1],
            ["name"=>"Nike Blazer Low '77",
            "type_product_id"=>8,
            "gender_id"=>2],
        ]);
    }
}
