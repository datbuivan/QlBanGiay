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
            "design_id"=>null,
            "type_product_id"=>8,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-force-1-07-shoes.png",
            "gender_id"=>2],

            ["name"=>"Nike Dunk Low Retro",
            "design_id"=>2,
            "product_status"=>true,
            "hot_status"=>false,
            "best_seller_status"=>false,
            "type_product_id"=>8,
            "avatar"=>"air-force-1-07-shoes-X.png",
            "gender_id"=>1],

            ["name"=>"Nike Blazer Low '77",
            "design_id"=>2,
            "product_status"=>true,
            "hot_status"=>false,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-craft-shoes.png",
            "type_product_id"=>8,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-craft-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>2],
            
            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"revolution-6-road-running-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"dunk-low-retro-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"impact-4-basketball-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"impact-4-basketball-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>2],

    
        ]);
    }
}