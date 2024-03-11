<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::get("/", [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "login"])->middleware("guest")->name("postLogin");

Route::post("/logout", [LogoutController::class, "logout"])->middleware("auth")->name("logout");
    
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard");

    Route::resource("user", UserController::class)->names("user");
    Route::resource("pakets", PaketController::class)->names("pakets");
    Route::resource("customers", CustomerController::class)->names("customers");
});
Route::prefix('sales')->middleware('auth')->group(function () {
    Route::get("/", [DController::class, "indexx"])->name("d");

    Route::resource("customers", CustomerController::class)->names("customers");
});
