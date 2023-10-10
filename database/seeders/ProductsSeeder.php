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
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "gender_id"=>2],

            ["name"=>"Nike Dunk Low Retro",
            "design_id"=>2,
            "product_status"=>"mở bán",
            "hot_status"=>"no",
            "best_seller_status"=>"no",
            "type_product_id"=>8,
            "gender_id"=>1],

            ["name"=>"Nike Blazer Low '77",
            "design_id"=>2,
            "product_status"=>"mở bán",
            "hot_status"=>"no",
            "best_seller_status"=>"yes",
            "type_product_id"=>8,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Elevate High",
            "design_id"=>3,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>2],
            
            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "design_id"=>1,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "design_id"=>1,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "design_id"=>1,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "design_id"=>1,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate Low",
            "design_id"=>1,
            "product_status"=>"mở bán",
            "hot_status"=>"yes",
            "best_seller_status"=>"yes",
            "type_product_id"=>5,
            "gender_id"=>2]
        ]);
    }
}
