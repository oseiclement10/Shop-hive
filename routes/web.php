<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use App\Http\Requests\VendorEmailVerificationRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Livewire\Welcome;



Route::get('/mary-checkup', Welcome::class);

// LANDING
Route::view("/", "landing.index")->name("home");
Route::view("/about", "landing.about")->name("about");
Route::view("/join-us", "landing.joinus")->name("join-us");

// USER AUTHS
Route::view("/login", "user.auth.login")->name("login");
Route::view("/signup", "user.auth.signup")->name("signup");
Route::view("/email/verify", "user.auth.verify-email")->name("verify.email");
Route::get("/email/verification/{id}/{hash}", function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect("/shop");
})->middleware(["signed"])->name("verification.verify");

Route::post("/email/verification-notification", function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back();
})->middleware(["auth", "throttle:6,1"])->name("send.verification");

Route::post("/signup", [UserController::class, "store"]);
Route::post("/login", [SessionController::class, "userLogin"]);
Route::post("/logout", [SessionController::class, "userLogout"])->middleware(["auth"])->name("logout");

//  SHOP
Route::get("/shop", [ShopController::class, "index"])->middleware(["auth", "verified"])->name("shop");




//VENDOR 
Route::prefix("vendor")->name("vendor.")->group(function () {
    Route::view("login", "vendor.auth.login")->name("login");
    Route::view("email/verify", "vendor.auth.verify-email")->name("verify.email");
    Route::get("email/verification/{id}/{hash}", function (VendorEmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route("vendor.dashboard");
    })->middleware(["signed"])->name("verification.verify");

    Route::post("email/verification-notification", function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back();
    })->middleware(["auth", "throttle:6,1"])->name("send.verification");

    Route::post("login", [SessionController::class, "vendorLogin"])->name("login");

    Route::middleware("vendor-auth")->group(function () {
        Route::view("dashboard", "vendor.dashboard")->name("dashboard");
        Route::resource("products", ProductController::class)->names(["index"=>"products"]);
        Route::get("orders", [OrderController::class,"vendorOrders"])->name("orders");
        Route::view("customers", "vendor.customers")->name("customers");
        Route::view("reports", "vendor.reports")->name("reports");
        Route::post("logout", [SessionController::class, "vendorLogout"])->name("logout");
    });
});














