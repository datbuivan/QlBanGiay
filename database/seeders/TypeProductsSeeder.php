<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("type_products")->insert([
            ["name"=>"Running"],
            ["name"=>"Golf"],
            ["name"=>"Football"],
            ["name"=>"Basketball"],
            ["name"=>"Jordan"],
            ["name"=>"Walking"],
            ["name"=>"Athlectic"],
            ["name"=>"Lifestyle"]
        ]);
    }
}
