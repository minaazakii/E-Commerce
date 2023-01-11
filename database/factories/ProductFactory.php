<?php

namespace Database\Factories;

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
            'name'=>$this->faker->name,
            'description'=>$this->faker->sentence,
            'price'=>$this->faker->randomFloat(1,60,100),
            'image'=>$this->faker->image,
            'category_id'=>1,
            'discount_price'=>$this->faker->randomFloat(1,1,50)
        ];
    }
}
