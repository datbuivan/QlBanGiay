<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("purchases")->insert([
            [
                "purchase_date"=>"2023-10-05",
                "employee_id"=>2
            ],
            [
                "purchase_date"=>"2023-10-06",
                "employee_id"=>2
            ]
        ]);
    }
}
