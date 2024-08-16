<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmacyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Pharmacy::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name . "'s Pharmacy",
            'address' => $this->faker->address,
        ];
    }
}
