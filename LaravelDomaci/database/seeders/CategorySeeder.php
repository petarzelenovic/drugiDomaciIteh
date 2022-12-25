<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'name'=>"Cheap",
            'slug'=>"cheap",
            'description'=>"this category is about cheap brands"
 
        ]);
        Category::create([
         'name'=>"Expensive",
         'slug'=>"expensive",
         'description'=>"this category is about expensive brands"
 
     ]);
     Category::create([
         'name'=>"Handmade",
         'slug'=>"handmade",
         'description'=>"This category is about handmade brands"
 
     ]);
    }
}
