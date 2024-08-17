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
        $pharmacies = Pharmacy::factory()->count(20000)->create();
        $products = Product::factory()->count(50000)->create();

        $pharmacies->each(function ($pharmacy) use ($products) {
            $selectedProducts = $products->random(random_int(1,11));

            $pivotData = $selectedProducts->mapWithKeys(function ($product){
                return [
                    $product->id => [
                        'price' => random_int(1, 1000),
                        'quantity' => random_int(1, 1000),
                    ],
                ];
            })->toArray();

            $pharmacy->products()->attach($pivotData);
        });

        $products->each(function ($product) use ($pharmacies) {
            if ($product->pharmacies->isEmpty()) {
                $pharmacy = $pharmacies->random();
                $pharmacy->products()->attach($product->id, [
                    'price' => random_int(1, 1000),
                    'quantity' => random_int(1, 1000),
                ]);
            }
        });
    }
}
