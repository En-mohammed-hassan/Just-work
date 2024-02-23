<?php


use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ListingController::class, "index"]);
Route::get('/listing/manage', [ListingController::class, "manage"]);

route::resource("/listing", ListingController::class);

// route::resource('/user', UserController::class);
route::post("/user", [UserController::class, "store"])->middleware("guest");
route::get("/user/login", [UserController::class, "login"])->name("login")->middleware("guest");
route::get("/user/create", [UserController::class, "create"])->middleware("guest");
route::post("/user/logout", [UserController::class, "logout"])->middleware("auth");
route::post("/user/auth", [UserController::class, "auth"])->middleware("guest");
// Auth::routes(["verify" => true]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');
