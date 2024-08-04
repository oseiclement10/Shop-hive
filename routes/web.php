<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use App\Http\Requests\VendorEmailVerificationRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

    Route::middleware("auth:vendor")->group(function () {
        Route::view("dashboard", "vendor.dashboard")->name("dashboard");
        Route::post("logout", [SessionController::class, "vendorLogout"])->name("logout");
    });
});





// Route::get('/', function () {
//     return view('index');
// })->name("home");

// Route::get('/login', function () {
//     return view("auth.login");
// });

// Route::get("/admin-login", function () {
//     return view("auth.adminlogin");
// }); 

// Route::get("/about", function () {
//     return view("about");
// })->name("about");

// Route::get("/join-us", function () {
//     return view("joinus");
// })->name("join-us");

// Route::post("/logout", function (Request $request) {
//     Auth::logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
//     return redirect("/login");
// })->middleware(["auth"])->name("logout");

// Route::get('/signup', function () {
//     return view("auth.signup");
// });

// Route::get("/email/verify", function () {
//     return view("auth.verify-email");
// })->name("verify.email");

// Route::get("/email/verification/{id}/{hash}", function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect("/shop");
// })->middleware(["signed"])->name("verification.verify");








