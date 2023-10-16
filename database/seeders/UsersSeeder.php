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
            // nv
            ["name"=>"ngoc hoan",
            "email"=>"hoan@gmail.com",
            "password"=>\Hash::make("hoan123"),
            "phone_number"=>"0959684412",
            "status"=>"hoat dong",
            "role_id"=>4],
            ["name"=>"duc",
            "email"=>"duc@gmail.com",
            "password"=>\Hash::make("duc123"),
            "phone_number"=>"0959684434",
            "status"=>"hoat dong",
            "role_id"=>4],
            // KH
            ["name"=>"the huong",
            "email"=>"thehuong123@gmail.com",
            "password"=>\Hash::make("thehuong123"),
            "phone_number"=>"0959684456",
            "status"=>"hoat dong",
            "role_id"=>3],
            ["name"=>"quang duc",
            "email"=>"quangduc@gmail.com",
            "password"=>\Hash::make("quangduc123"),
            "phone_number"=>"0959684478",
            "status"=>"hoat dong",
            "role_id"=>3],
            ["name"=>"quang thuan",
            "email"=>"quangthuan@gmail.com",
            "password"=>\Hash::make("quangthuan123"),
            "phone_number"=>"0959684344",
            "status"=>"hoat dong",
            "role_id"=>3],
            ["name"=>"bui dat",
            "email"=>"buidat@gmail.com",
            "password"=>\Hash::make("buidat123"),
            "phone_number"=>"0959684567",
            "status"=>"hoat dong",
            "role_id"=>3]
        ]);
    }
}
