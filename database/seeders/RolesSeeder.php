<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("roles")->insert([
            ["name"=>"administractor"],
            ["name"=>"edit"],
            ["name"=>"customer"],
            ["name"=>"staff"]
        ]);
    }
}
