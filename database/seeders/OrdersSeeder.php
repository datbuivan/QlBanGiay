<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
                "deliver_id"=>1,
                "created_at"=>Carbon::now()->format("Y-m-d H:i:s")
        ],
            

        ]);
    }
}
