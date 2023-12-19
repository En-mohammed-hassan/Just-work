<?php

use App\http\Controllers\producController;
use App\http\Controllers\usercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/register",[usercontroller::class ,"reg"] );
Route::post("/login",[usercontroller::class ,"login"] );


Route::group(['middleware'=> ["auth:sanctum"]],function(){
    Route::post("/logout",[usercontroller::class ,"logout"] );

 Route::resource("product",producController::class);

});



// Route::post("/product",function(){
//     return product::create([
//     "title" => "mhd"
//     ,"img" => "hs"
//     ,"price" => "99"
//     ,"count" =>"22"
//     ,"description"=>"sdsd"
//     ,"category" =>"sdsd"]);
// });