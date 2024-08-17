<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::paginate(10);
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
            'price' => ['required', 'integer', 'min:1', 'max:1000'],
            'quantity' => ['required', 'integer', 'min:0', 'max:1000'],
            'image' => ['required', 'string'],
            'description' => ['required', 'min:3', 'max:255']
        ]);
        $imageData = $request->input('image');

        if (preg_match('/^data:image\/(\w+);base64,(.+)$/', $imageData, $matches)) {
            $extension = $matches[1];
            $imageBase64 = $matches[2];
            $image = base64_decode($imageBase64);

            $filename = uniqid() . '.' . $extension;

            Storage::disk('public')->put('uploads/' . $filename, $image);

            $image = Image::make(public_path('storage/uploads/' . $filename))->fit(640, 480);
            $image->save();

            $product = Product::create(array_merge($data, ['image' => '/storage/uploads/' . $filename]));

            return $product;        
        }
        else{
            return response()->json(['success' => 'false'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
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
            'price' => ['required', 'integer', 'min:1', 'max:1000'],
            'quantity' => ['required', 'integer', 'min:0', 'max:1000'],
            'image' => ['string'],
            'description' => ['required', 'min:3', 'max:255']
        ]);
        if(request('image')){
            $imageData = $request->input('image');

            if (preg_match('/^data:image\/(\w+);base64,(.+)$/', $imageData, $matches)) {
                $extension = $matches[1];
                $imageBase64 = $matches[2];
                $image = base64_decode($imageBase64);

                $filename = uniqid() . '.' . $extension;

                Storage::disk('public')->put('uploads/' . $filename, $image);

                $image = Image::make(public_path('storage/uploads/' . $filename))->fit(640, 480);
                $image->save();

                $product->update(array_merge($data, ['image' => '/storage/uploads/' . $filename]));

                return $product;        
            }
            else{
                return response()->json(['success' => 'false'], 400);
            }
        }
        else{
            $product->update(array_merge($data, ['image' => $product->image ]));

            return $product;        
        }
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

        return response()->json([], 204);
    }
}
