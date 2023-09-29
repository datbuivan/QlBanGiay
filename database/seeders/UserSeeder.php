<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            "name"=>"admin",
            "email"=>"admin@gmail.com",
            "password"=>\Hash::make("admin"),
            "phone_number"=>"0674757648",
            "status"=>"hoat dong",
            "roles_id"=>1
        ]);
    }
}
