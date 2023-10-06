<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("users")->insert([
            ["name"=>"admin",
            "email"=>"admin@gmail.com",
            "password"=>\Hash::make("admin"),
            "phone_number"=>"0674757648",
            "status"=>"hoat dong",
            "role_id"=>1],
            ["name"=>"huong",
            "email"=>"huong@gmail.com",
            "password"=>\Hash::make("huong123"),
            "phone_number"=>"0959684432",
            "status"=>"hoat dong",
            "role_id"=>3]
        ]);
    }
}
