<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view("auth.login");
});

Route::get('/signup', function () {
    return view("auth.signup");
});

Route::post("/login", [SessionController::class, "store"]);
Route::post("/signup", [UserController::class, "store"]);

Route::get("/shop", [ShopController::class, "index"]);



