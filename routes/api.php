<?php

use App\Http\Controllers\CustomerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix("customers")->group(function(){
    Route::get("/",[CustomerController::class,"index"])->name("customers.index");
    Route::get("/{id}",[CustomerController::class,"show"])->name("customers.show");
    Route::post("/store",[CustomerController::class,"store"])->name("customers.store");
    
});
