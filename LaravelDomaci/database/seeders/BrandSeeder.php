<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        Brand::create([
            'brandName'=>"Nike",
            'slug'=>"nike",
            'category_id'=>Category::all()->random()->id,
            
 
        ]);
        Brand::create([
         'brandName'=>"Puma",
         'slug'=>"puma",
         'category_id'=>Category::all()->random()->id,
         
 
     ]);
     Brand::create([
         'brandName'=>"Balenciaga",
         'slug'=>"balenciaga",
         'category_id'=>Category::all()->random()->id,
     ]);

     Brand::create([
        'brandName'=>"Adidas",
        'slug'=>"adidas",
        'category_id'=>Category::all()->random()->id,
    ]);
    }
}
