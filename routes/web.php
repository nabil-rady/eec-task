<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\SearchProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products/search', SearchProductController::class);

Route::resource('products', ProductsController::class);
Route::resource('pharmacies', PharmacyController::class);

Route::get('/', function () {
    return view('welcome');
});
