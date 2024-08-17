<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class SearchCheapest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:search-cheapest {product_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists the 5 pharmacies with the cheapest price for chosen product.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product_id = $this->argument('product_id');

        $pharmacies = Product::find($product_id)->pharmacies()->orderBy('pharmacy_product.price')->take(5)->get();

        if($pharmacies->isEmpty()){
            $this->line('No Products found.');
            return 0;
        }

        $this->table(
            ['ID', 'Name', 'Address', 'Price'],
            $pharmacies->map(function ($pharmacy) {
                return [
                    $pharmacy->id,
                    $pharmacy->name,
                    $pharmacy->address,
                    $pharmacy->pivot->price
                ];
            })
        );

        return 0;
    }
}
