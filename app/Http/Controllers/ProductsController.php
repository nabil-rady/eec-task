<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],

            'prices' => ['required', 'array', 'min:1'],
            'pirces.*' => ['integer', 'min:1', 'max:1000'],
            'quantities' => ['required', 'array', 'min:1'],
            'quantities.*' => ['integer', 'min:0', 'max:1000'],
            'pharmacies' => ['required', 'array', 'min:1'],
            'quantities.*' => ['integer'],

            'image' => ['required', 'image'],
        ]);

        $pharmacies = Pharmacy::whereIn("id", $data['pharmacies'])->get();
        
        if(count($pharmacies) != count($data['pharmacies'])){
            return view('products.create');
        }

        $path = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/$path"))->fit(640, 480);
        $image->save();

        $product = Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => '/storage/' . $path
        ]);

        $pivotData = [];

        for ($i = 0; $i < count($pharmacies); $i++) {
            $pivotData[$pharmacies[$i]['id']] = [
                'price' => $data['prices'][$i],
                'quantity' => $data['quantities'][$i],
            ];
        }

        $product->pharmacies()->attach($pivotData);   

        return redirect('/products/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            
            'prices' => ['required', 'array', 'min:1'],
            'pirces.*' => ['integer', 'min:1', 'max:1000'],
            'quantities' => ['required', 'array', 'min:1'],
            'quantities.*' => ['integer', 'min:0', 'max:1000'],
            'pharmacies' => ['required', 'array', 'min:1'],
            'quantities.*' => ['integer'],
            
            'image' => ['image'],
        ]);

        if(request('image')){
            $path = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/$path"))->fit(640, 480);
            $image->save();
            
            $path = '/storage/' . $path;
        }

        else{
            $path = $product->image;
        }

        $pharmacies = Pharmacy::whereIn("id", $data['pharmacies'])->get();
        
        if(count($pharmacies) != count($data['pharmacies'])){
            return view('products.create');
        }

        $product->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $path
        ]);

        $pivotData = [];

        for ($i = 0; $i < count($pharmacies); $i++) {
            $pivotData[$pharmacies[$i]['id']] = [
                'price' => $data['prices'][$i],
                'quantity' => $data['quantities'][$i],
            ];
        }

        $product->pharmacies()->sync($pivotData);

        return redirect('/products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
