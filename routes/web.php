<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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
Route::get("/shop", [ShopController::class, "index"]);



