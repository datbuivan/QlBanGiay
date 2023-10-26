<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("sizes")->insert([
            ["name"=>"36"],
            ["name"=>"37"],
            ["name"=>"38"],
            ["name"=>"39"],
            ["name"=>"40"],
            ["name"=>"41"],
            ["name"=>"42"],
            ["name"=>"43"],
            ["name"=>"44"]
        ]);
    }
}