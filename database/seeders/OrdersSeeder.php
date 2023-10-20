<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("orders")->insert([
            [
                "order_date"=>"2023-10-10",
                "full_name"=>"Nguyen The Huong",
                "pay_method"=>"CASH",
                "email"=>"huong@gmail.com",
                "phone_number"=>"0123456789",
                "city"=>"Ha Nam",
                "district"=>"Binh Luc",
                "ward"=>"Dong Du",
                "street"=>"Thon Noi 1",
                "status"=>"pending",
                "customer_id"=>4,
                "employee_id"=>3,
                "deliver_id"=>1
        ],
            

        ]);
    }
}
