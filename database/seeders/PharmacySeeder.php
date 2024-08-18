<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pharmacy;
use App\Models\Product;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = Pharmacy::class;

    public function run()
    {
        Pharmacy::factory(15000)
            ->hasAttached(
                Product::factory()->count(3),
                function () {
                    return [
                        'price' => rand(1, 1000),
                        'quantity' => rand(1, 1000),
                    ];
                }
            )
            ->create();
        Pharmacy::factory(5000)
            ->hasAttached(
                Product::factory()->count(1),
                function () {
                    return [
                        'price' => rand(1, 1000),
                        'quantity' => rand(1, 1000),
                    ];
                }
            )
            ->create();
    }
}
