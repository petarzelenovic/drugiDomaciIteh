<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand_id'=>Brand::factory(),
            'user_id'=>User::factory(),
            
            'name'=>$this->faker->text(),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->text(70),
            'price'=>$this->faker->numerify(),
        ];
    }
}
