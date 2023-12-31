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
            "import_price"=>500000,
            "export_price"=>1200000,
            "discount"=>0.3,
            "color_id"=>1,
            "avatar"=>"air-force-1-07-shoes.png",
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "type_product_id"=>8,
            "design_id"=>null,
            "gender_id"=>3,],

            ["name"=>"Nike Air Force 1 '07",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>5,
            "avatar"=>"air-force-1-07-shoes-X.png",
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "type_product_id"=>8,
            "design_id"=>null,
            "gender_id"=>2],


            ["name"=>"Air Jordan 1 Mid SE Craft",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>1,
            "design_id"=>2,
            "product_status"=>true,
            "hot_status"=>false,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-craft-shoes.png",
            "type_product_id"=>8,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Mid SE Craft",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>2,
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-craft-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Elevate High",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>1,
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Elevate High",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>2,
            "design_id"=>3,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"air-jordan-1-mid-se-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>2],
            
            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>1,
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"revolution-6-road-running-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>2],

            ["name"=>"Air Jordan 1 Zoom CMFT 2",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>5,
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"dunk-low-retro-shoes-X.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>1,
            "design_id"=>1,
            "product_status"=>true,
            "hot_status"=>true,
            "best_seller_status"=>true,
            "avatar"=>"impact-4-basketball-shoes.png",
            "type_product_id"=>5,
            "gender_id"=>1],

            ["name"=>"Air Jordan 1 Low SE",
            "import_price"=>700000,
            "export_price"=>1500000,
            "discount"=>0.3,
            "color_id"=>2,
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