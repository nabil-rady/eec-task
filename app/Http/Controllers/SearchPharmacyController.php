<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacy;

class SearchPharmacyController extends Controller
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
            return response()->json([], 200);

        return response()->json([
            "results" =>  Pharmacy::search($request->input('q'))->take(10)->get()->map(function($item) {
                return [
                    "id" => $item->id,
                    "text" => $item->name,
                ];
            }),
        ]);
    }
}
