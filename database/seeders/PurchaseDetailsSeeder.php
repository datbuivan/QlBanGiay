<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("purchase_details")->insert([
            [
                "price"=>2000000,
                "quantity"=>50,
                "product_id"=>1,
                "purchase_id"=>1
            ],
            [
                "price"=>3400000,
                "quantity"=>50,
                "product_id"=>2,
                "purchase_id"=>1
            ],
            [
                "price"=>3490000,
                "quantity"=>50,
                "product_id"=>3,
                "purchase_id"=>1
            ],
           
        ]);
    }
}
