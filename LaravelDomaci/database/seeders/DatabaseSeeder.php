<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
       
        // Product::factory()->create(); da kreira sve sam
       
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
       

        $this->call(ProductSeeder::class);

    }
}
