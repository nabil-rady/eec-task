<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $images = ["/1.jpg", "/2.jpg", "/3.jpg", "/4.jpg"];
    protected $records = 50000;

    public function run()
    {
        DB::table('product')->insert([
            'title' => Str::random(10),
            'description' => Str::random(30),
            'image' => $this->images[array_rand($this->images)],
            'price' => random_int(10, 300),
            'quantity' => random_int(1, 1000),
        ]);
    }
}
