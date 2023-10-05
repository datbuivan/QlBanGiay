<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("colors")->insert([
            ["name"=>"white","codeHex"=>"#FFFFFF"],
            ["name"=>"black","codeHex"=>"#000000"],
            ["name"=>"grey","codeHex"=>"#7D7C7C"],
            ["name"=>"blue","codeHex"=>"#000000"],
            ["name"=>"pink","codeHex"=>"#FF6AC2"],
            ["name"=>"red","codeHex"=>"#FE0000"],
            ["name"=>"yellow","codeHex"=>"#F4E869"],
            ["name"=>"green","codeHex"=>"#A2FF86"]

        ]);
    }
}
