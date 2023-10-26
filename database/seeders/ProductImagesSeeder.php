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
        \DB::table("product_images")->insert([
            ["name"=>"air-force-1-07-shoes.png",'product_id'=>1], 
            ["name"=>"air-force-1-07-shoes-1.png",'product_id'=>1], 
            ["name"=>"air-force-1-07-shoes-2.png",'product_id'=>1],
            ["name"=>"air-force-1-07-shoes-3.png",'product_id'=>1],
            ["name"=>"air-force-1-07-shoes-4.png",'product_id'=>1],
        
            ["name"=>"air-force-1-07-shoes-X.png",'product_id'=>2],
            ["name"=>"air-force-1-07-shoes-X-1.png",'product_id'=>2],
            ["name"=>"air-force-1-07-shoes-X-2.png",'product_id'=>2],
            ["name"=>"air-force-1-07-shoes-X-3.png",'product_id'=>2],
            ["name"=>"air-force-1-07-shoes-X-4.png",'product_id'=>2],
          
            ["name"=>"air-jordan-1-mid-se-craft-shoes.png",'product_id'=>3],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-1.png",'product_id'=>3],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-2.png",'product_id'=>3],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-3.png",'product_id'=>3],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-4.png",'product_id'=>3],
       
            ["name"=>"air-jordan-1-mid-se-craft-shoes-X.png",'product_id'=>4],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-X-1.png",'product_id'=>4],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-X-2.png",'product_id'=>4],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-X-3.png",'product_id'=>4],
            ["name"=>"air-jordan-1-mid-se-craft-shoes-X-4.png",'product_id'=>4],
           
            ["name"=>"air-jordan-1-mid-se-shoes.png",'product_id'=>5],
            ["name"=>"air-jordan-1-mid-se-shoes-1.png",'product_id'=>5],
            ["name"=>"air-jordan-1-mid-se-shoes-2.png",'product_id'=>5],
            ["name"=>"air-jordan-1-mid-se-shoes-3.png",'product_id'=>5],
            ["name"=>"air-jordan-1-mid-se-shoes-4.png",'product_id'=>5],
          
            ["name"=>"air-jordan-1-mid-se-shoes-X.png",'product_id'=>6],
            ["name"=>"air-jordan-1-mid-se-shoes-X-1.png",'product_id'=>6],
            ["name"=>"air-jordan-1-mid-se-shoes-X-2.png",'product_id'=>6],
            ["name"=>"air-jordan-1-mid-se-shoes-X-3.png",'product_id'=>6],
            ["name"=>"air-jordan-1-mid-se-shoes-X-4.png",'product_id'=>6],
          
            ["name"=>"revolution-6-road-running-shoes.png", 'product_id'=>7],
            ["name"=>"revolution-6-road-running-shoes-1.png", 'product_id'=>7],
            ["name"=>"revolution-6-road-running-shoes-2.png", 'product_id'=>7],
            ["name"=>"revolution-6-road-running-shoes-3.png", 'product_id'=>7],
            ["name"=>"revolution-6-road-running-shoes-4.png", 'product_id'=>7],
         
            ["name"=>"dunk-low-retro-shoes-X.png",  'product_id'=>8],
            ["name"=>"dunk-low-retro-shoes-X-1.png",  'product_id'=>8],
            ["name"=>"dunk-low-retro-shoes-X-2.png",  'product_id'=>8],
            ["name"=>"dunk-low-retro-shoes-X-3.png",  'product_id'=>8],
            ["name"=>"dunk-low-retro-shoes-X-4.png",  'product_id'=>8],
           
            ["name"=>"impact-4-basketball-shoes.png", 'product_id'=>9],
            ["name"=>"impact-4-basketball-shoes-1.png", 'product_id'=>9],
            ["name"=>"impact-4-basketball-shoes-2.png", 'product_id'=>9],
            ["name"=>"impact-4-basketball-shoes-3.png", 'product_id'=>9],
            ["name"=>"impact-4-basketball-shoes-4.png", 'product_id'=>9],
        
            ["name"=>"impact-4-basketball-shoes-X.png", 'product_id'=>10],
            ["name"=>"impact-4-basketball-shoes-X-1.png", 'product_id'=>10],
            ["name"=>"impact-4-basketball-shoes-X-2.png", 'product_id'=>10],
            ["name"=>"impact-4-basketball-shoes-X-3.png", 'product_id'=>10],
            ["name"=>"impact-4-basketball-shoes-X-4.png", 'product_id'=>10],

            ["name"=>"air-jordan-1-low-se-older-shoes-pwgRgs.png", 'product_id'=>11],
            ["name"=>"air-jordan-1-low-se-older-shoes-pwgRgs-1.png", 'product_id'=>11],
            ["name"=>"air-jordan-1-low-se-older-shoes-pwgRgs-2.png", 'product_id'=>11],
            ["name"=>"air-jordan-1-low-se-older-shoes-pwgRgs-3.png", 'product_id'=>11],
            ["name"=>"air-jordan-1-low-se-older-shoes-pwgRgs-4.png", 'product_id'=>11],

          
            ["name"=>"air-jordan-1-low-se-shoes-fQgpsv-2.png", 'product_id'=>12],
            ["name"=>"air-jordan-1-low-se-shoes-fQgpsv-3.png", 'product_id'=>12],

            ["name"=>"air-jordan-1-mid-shoes-SQf7DM.png", 'product_id'=>13],
            ["name"=>"air-jordan-1-mid-shoes-SQf7DM-1.png", 'product_id'=>13],
            ["name"=>"air-jordan-1-mid-shoes-SQf7DM-2.png", 'product_id'=>13],
            ["name"=>"air-jordan-1-mid-shoes-SQf7DM-3.png", 'product_id'=>13],
            ["name"=>"air-jordan-1-mid-shoes-SQf7DM-4.png", 'product_id'=>13],

            
            ["name"=>"air-jordan-legacy-312-low-shoes-9PbsF4.png", 'product_id'=>14],
            ["name"=>"air-jordan-legacy-312-low-shoes-9PbsF4-1.png", 'product_id'=>14],
            ["name"=>"air-jordan-legacy-312-low-shoes-9PbsF4-2.png", 'product_id'=>14],
            ["name"=>"air-jordan-legacy-312-low-shoes-9PbsF4-3.png", 'product_id'=>14],
            ["name"=>"air-jordan-legacy-312-low-shoes-9PbsF4-4.png", 'product_id'=>14],

           
            ["name"=>"dunk-low-retro-shoes.png", 'product_id'=>15],
            ["name"=>"dunk-low-retro-shoes-1.png", 'product_id'=>15],
            ["name"=>"dunk-low-retro-shoes-2.png", 'product_id'=>15],
            ["name"=>"dunk-low-retro-shoes-3.png", 'product_id'=>15],
            ["name"=>"dunk-low-retro-shoes-4.png", 'product_id'=>15],

            ["name"=>"jordan-one-take-4-pf-shoes.png", 'product_id'=>16],
            ["name"=>"jordan-one-take-4-pf-shoes-1.png", 'product_id'=>16],
            ["name"=>"jordan-one-take-4-pf-shoes-2.png", 'product_id'=>16],
            ["name"=>"jordan-one-take-4-pf-shoes-3.png", 'product_id'=>16],
            ["name"=>"jordan-one-take-4-pf-shoes-4.png", 'product_id'=>16],


            ["name"=>"jordan-one-take-4-pf-shoes-X.png", 'product_id'=>17],
            ["name"=>"jordan-one-take-4-pf-shoes-X-1.png", 'product_id'=>17],
            ["name"=>"jordan-one-take-4-pf-shoes-X-2.png", 'product_id'=>17],
            ["name"=>"jordan-one-take-4-pf-shoes-X-3.png", 'product_id'=>17],
            ["name"=>"jordan-one-take-4-pf-shoes-X-4.png", 'product_id'=>17],


            ["name"=>"revolution-6-road-running-shoes-X.png", 'product_id'=>18],
            ["name"=>"revolution-6-road-running-shoes-X-1.png", 'product_id'=>18],
            ["name"=>"revolution-6-road-running-shoes-X-2.png", 'product_id'=>18],
            ["name"=>"revolution-6-road-running-shoes-X-3.png", 'product_id'=>18],
            ["name"=>"revolution-6-road-running-shoes-X-4.png", 'product_id'=>18],

            
            ["name"=>"sabrina-1-ionic-ep-basketball-shoes-ZK1Xwv.png", 'product_id'=>19],
            ["name"=>"sabrina-1-ionic-ep-basketball-shoes-ZK1Xwv-1.png", 'product_id'=>19],
            ["name"=>"sabrina-1-ionic-ep-basketball-shoes-ZK1Xwv-2.png", 'product_id'=>19],
            ["name"=>"sabrina-1-ionic-ep-basketball-shoes-ZK1Xwv-3.png", 'product_id'=>19],
            ["name"=>"sabrina-1-ionic-ep-basketball-shoes-ZK1Xwv-4.png", 'product_id'=>19],
            
            ["name"=>"structure-25-road-running-shoes-tFBSvw.png", 'product_id'=>20],
            ["name"=>"structure-25-road-running-shoes-tFBSvw-1.png", 'product_id'=>20],
            ["name"=>"structure-25-road-running-shoes-tFBSvw-2.png", 'product_id'=>20],
            ["name"=>"structure-25-road-running-shoes-tFBSvw-3.png", 'product_id'=>20],
            ["name"=>"structure-25-road-running-shoes-tFBSvw-4.png", 'product_id'=>20],

            
            ["name"=>"tech-hera-shoes.png", 'product_id'=>21],
            ["name"=>"tech-hera-shoes-1.png", 'product_id'=>21],
            ["name"=>"tech-hera-shoes-2.png", 'product_id'=>21],
            ["name"=>"tech-hera-shoes-3.png", 'product_id'=>21],
            ["name"=>"tech-hera-shoes-4.png", 'product_id'=>21],

            ["name"=>"tech-hera-shoes-X.png", 'product_id'=>22],
            ["name"=>"tech-hera-shoes-X-1.png", 'product_id'=>22],
            ["name"=>"tech-hera-shoes-X-2.png", 'product_id'=>22],
            ["name"=>"tech-hera-shoes-X-3.png", 'product_id'=>22],
            ["name"=>"tech-hera-shoes-X-4.png", 'product_id'=>22],
    ]);
    }
}