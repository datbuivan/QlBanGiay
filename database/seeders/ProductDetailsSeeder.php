<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table("product_details")->insert([
            //sp1
            ["quantity"=>"10","size_id"=>"3","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"5","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"1","product_id"=>"1",],
            ["quantity"=>"10","size_id"=>"2","product_id"=>"1",],
            //sp2
            ["quantity"=>"10","size_id"=>"3","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"5","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"1","product_id"=>"2",],
            ["quantity"=>"10","size_id"=>"2","product_id"=>"2",],
            //sp3
            ["quantity"=>"10","size_id"=>"3","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"5","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"1","product_id"=>"3",],
            ["quantity"=>"10","size_id"=>"2","product_id"=>"3",],
            //sp4
            ["quantity"=>"10","size_id"=>"3","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"5","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"1","product_id"=>"4",],
            ["quantity"=>"10","size_id"=>"2","product_id"=>"4",],
            //sp5
            ["quantity"=>"10","size_id"=>"3","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"5","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"1","product_id"=>"5",],
            ["quantity"=>"10","size_id"=>"2","product_id"=>"5",],
            //sp6
            ["quantity"=>"10","size_id"=>"3","product_id"=>"6",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"6",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"6",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"6",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"6",],
            //sp7
            ["quantity"=>"10","size_id"=>"3","product_id"=>"7",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"7",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"7",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"7",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"7",],
            //sp8
            ["quantity"=>"10","size_id"=>"3","product_id"=>"8",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"8",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"8",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"8",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"8",],
            //sp9
            ["quantity"=>"10","size_id"=>"3","product_id"=>"9",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"9",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"9",],
            //sp10
            ["quantity"=>"10","size_id"=>"3","product_id"=>"10",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"10",],

            //sp11
            ["quantity"=>"10","size_id"=>"3","product_id"=>"11",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"11",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"11",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"11",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"11",],
            //sp12
            ["quantity"=>"10","size_id"=>"3","product_id"=>"12",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"12",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"12",],
            //sp13
            ["quantity"=>"10","size_id"=>"3","product_id"=>"13",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"13",],

            //sp14
            ["quantity"=>"10","size_id"=>"3","product_id"=>"14",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"14",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"14",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"14",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"14",],
            //sp15
            ["quantity"=>"10","size_id"=>"3","product_id"=>"15",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"15",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"15",],
            //sp16
            ["quantity"=>"10","size_id"=>"3","product_id"=>"16",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"16",],

            //sp17
            ["quantity"=>"10","size_id"=>"3","product_id"=>"17",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"17",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"17",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"17",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"17",],
            //sp18
            ["quantity"=>"10","size_id"=>"3","product_id"=>"18",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"18",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"18",],
            //sp19
            ["quantity"=>"10","size_id"=>"3","product_id"=>"19",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"19",],

            //sp20
            ["quantity"=>"10","size_id"=>"3","product_id"=>"20",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"20",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"20",],
            ["quantity"=>"10","size_id"=>"7","product_id"=>"20",],
            ["quantity"=>"10","size_id"=>"8","product_id"=>"20",],
            //sp21
            ["quantity"=>"10","size_id"=>"3","product_id"=>"21",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"21",],
            ["quantity"=>"10","size_id"=>"6","product_id"=>"21",],
            //sp22
            ["quantity"=>"10","size_id"=>"3","product_id"=>"22",],
            ["quantity"=>"10","size_id"=>"4","product_id"=>"22",],



        ]);
    }
}