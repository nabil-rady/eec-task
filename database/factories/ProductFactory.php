<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Product::class;
 
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => random_int(10, 300),
            'quantity' => random_int(1, 1000),
        ];
    }
}
