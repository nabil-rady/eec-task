<?php

use App\Http\Controllers\ProductsAPIController;
use App\Http\Controllers\PharmacyAPIController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\SearchPharmacyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products/search', SearchProductController::class);
Route::get('/pharmacies/search', SearchPharmacyController::class);

Route::apiResource('products', ProductsAPIController::class);
Route::apiResource('pharmacies', PharmacyAPIController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
