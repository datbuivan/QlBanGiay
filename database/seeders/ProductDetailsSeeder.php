<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("product_details")->insert([
            [
                "import_price"=>"123",
                "export_price"=>"456",
                "quantity"=>"100",
                "discount"=>"10", 
                "size_id"=>"2",
                "color_id"=>"3",
                "product_id"=>"4",

            ],
          
        ]);
    }
}