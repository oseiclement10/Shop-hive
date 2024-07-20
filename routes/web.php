<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShopController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view("auth.login");
});

Route::get('/signup', function () {
    return view("auth.signup");
});

Route::get("/email/verify", function () {
    return view("auth.verify-email");
})->name("verify.email");

Route::get("/email/verification/{id}/{hash}", function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect("/shop");
})->middleware(["signed"])->name("verification.verify");

Route::post("/email/verification-notification", function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    // return back()->with("message", "Verification link sent on your email!");
    return back();
})->middleware(["auth", "throttle:6,1"])->name("send.verification");


Route::post("/login", [SessionController::class, "store"])->name('login');
Route::post("/signup", [UserController::class, "store"]);

Route::get("/shop", [ShopController::class, "index"]);



