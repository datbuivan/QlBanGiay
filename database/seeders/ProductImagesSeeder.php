<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        \DB::table("product_images")->insert([
                ["name"=>"air-force-1-07-shoes-1.png",'product_id'=>1], 
                ["name"=>"air-force-1-07-shoes-2.png",'product_id'=>1],
                ["name"=>"air-force-1-07-shoes-3.png",'product_id'=>1],
                ["name"=>"air-force-1-07-shoes-4.png",'product_id'=>1],
            
                ["name"=>"air-force-1-07-shoes-X-1.png",'product_id'=>2],
                ["name"=>"air-force-1-07-shoes-X-2.png",'product_id'=>2],
                ["name"=>"air-force-1-07-shoes-X-3.png",'product_id'=>2],
                ["name"=>"air-force-1-07-shoes-X-4.png",'product_id'=>2],
              
                ["name"=>"air-jordan-1-mid-se-craft-shoes-1.png",'product_id'=>3],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-2.png",'product_id'=>3],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-3.png",'product_id'=>3],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-4.png",'product_id'=>3],
           
                ["name"=>"air-jordan-1-mid-se-craft-shoes-X-1.png",'product_id'=>4],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-X-2.png",'product_id'=>4],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-X-3.png",'product_id'=>4],
                ["name"=>"air-jordan-1-mid-se-craft-shoes-X-4.png",'product_id'=>4],
               
                ["name"=>"air-jordan-1-mid-se-shoes-1.png",'product_id'=>5],
                ["name"=>"air-jordan-1-mid-se-shoes-2.png",'product_id'=>5],
                ["name"=>"air-jordan-1-mid-se-shoes-3.png",'product_id'=>5],
                ["name"=>"air-jordan-1-mid-se-shoes-4.png",'product_id'=>5],
              
                ["name"=>"air-jordan-1-mid-se-shoes-X-1.png",'product_id'=>6],
                ["name"=>"air-jordan-1-mid-se-shoes-X-2.png",'product_id'=>6],
                ["name"=>"air-jordan-1-mid-se-shoes-X-3.png",'product_id'=>6],
                ["name"=>"air-jordan-1-mid-se-shoes-X-4.png",'product_id'=>6],
              
                ["name"=>"revolution-6-road-running-shoes-1.png", 'product_id'=>7],
                ["name"=>"revolution-6-road-running-shoes-2.png", 'product_id'=>7],
                ["name"=>"revolution-6-road-running-shoes-3.png", 'product_id'=>7],
                ["name"=>"revolution-6-road-running-shoes-4.png", 'product_id'=>7],
             
                ["name"=>"dunk-low-retro-shoes-X-1.png",  'product_id'=>8],
                ["name"=>"dunk-low-retro-shoes-X-2.png",  'product_id'=>8],
                ["name"=>"dunk-low-retro-shoes-X-3.png",  'product_id'=>8],
                ["name"=>"dunk-low-retro-shoes-X-4.png",  'product_id'=>8],
               
                ["name"=>"impact-4-basketball-shoes-1.png", 'product_id'=>9],
                ["name"=>"impact-4-basketball-shoes-2.png", 'product_id'=>9],
                ["name"=>"impact-4-basketball-shoes-3.png", 'product_id'=>9],
                ["name"=>"impact-4-basketball-shoes-4.png", 'product_id'=>9],
            
                ["name"=>"impact-4-basketball-shoes-X-1.png", 'product_id'=>10],
                ["name"=>"impact-4-basketball-shoes-X-2.png", 'product_id'=>10],
                ["name"=>"impact-4-basketball-shoes-X-3.png", 'product_id'=>10],
                ["name"=>"impact-4-basketball-shoes-X-4.png", 'product_id'=>10],

                // ["name"=>"jordan-max-aura-4-shoes.png", 'product_id'=>11],
                // ["name"=>"jordan-max-aura-4-shoes.png", 'product_id'=>11],
                // ["name"=>"jordan-max-aura-4-shoes.png", 'product_id'=>11],
                // ["name"=>"jordan-max-aura-4-shoes.png", 'product_id'=>11],

                // ["name"=>"jordan-max-aura-4-shoes-X-1.png", 'product_id'=>12],
                // ["name"=>"jordan-max-aura-4-shoes.X-2.png", 'product_id'=>12],
                // ["name"=>"jordan-max-aura-4-shoes.X-2.png", 'product_id'=>12],
                // ["name"=>"jordan-max-aura-4-shoes.X-2.png", 'product_id'=>12],

                // ["name"=>"jordan-one-take-4-pf-shoes.png", 'product_id'=>13],
                // ["name"=>"jordan-one-take-4-pf-shoes.png", 'product_id'=>13],
                // ["name"=>"jordan-one-take-4-pf-shoes.png", 'product_id'=>13],
                // ["name"=>"jordan-one-take-4-pf-shoes.png", 'product_id'=>13],

                // ["name"=>"jordan-one-take-4-pf-shoes-X-1.png", 'product_id'=>14],
                // ["name"=>"jordan-one-take-4-pf-shoes-X-2.png", 'product_id'=>14],
                // ["name"=>"jordan-one-take-4-pf-shoes-X-2.png", 'product_id'=>14],
                // ["name"=>"jordan-one-take-4-pf-shoes-X-2.png", 'product_id'=>14],
        ]);
    }
}