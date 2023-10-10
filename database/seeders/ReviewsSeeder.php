<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("reviews")->insert([
            [
                "rate"=>5,
                "product_id"=>1,
                "userid"=>2,
                "comment"=>"Sản phẩm tuyệt vời"
            ],
            
        ]);
    }
}
