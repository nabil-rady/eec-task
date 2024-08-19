<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(!$request->has('q'))
            return view('products.search', ['products' => []]);

        $products =  Product::search($request->input('q'))->fastPaginate(10);
        
        return view('products.search', compact('products'));
    }
}
