<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("delivers")->insert([
            [
                "name"=>"binh_thuong",
                "cost"=>30000
            ],
            [
                "name"=>"nhanh",
                "cost"=>500000
            ],
            

        ]);
    }
}
