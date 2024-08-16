<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pharmacy;

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
        Pharmacy::factory()
            ->count(20000)
            ->hasProducts(3)
            ->create();
    }
}
