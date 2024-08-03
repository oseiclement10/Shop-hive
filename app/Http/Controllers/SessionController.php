<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function userLogin()
    {
        $validatedAttributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:4"]
        ]);

        if (!Auth::attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                "password" => ["The provided credentials are incorrect."]
            ]);
        }

        if (!Auth::user()->hasVerifiedEmail()) {
            Auth::user()->sendEmailVerificationNotification();
            return redirect()->route("verify.email");
        }

        request()->session()->regenerate();

        return redirect()->route("shop");

    }

    public function vendorLogin()
    {
        $validatedAttributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:4"]
        ]);

        if (!Auth::guard('vendor')->attempt($validatedAttributes)) {
            throw ValidationException::withMessages([
                "email" => ["The provided credentials are incorrect."]
            ]);
        }

        if (!Auth::guard('vendor')->user()->hasVerifiedEmail()) {
            Auth::guard('vendor')->user()->sendEmailVerificationNotification();
            return redirect()->route("vendor.verify.email");
        }

        request()->session()->regenerate();
        return redirect()->intended(route('vendor.dashboard'));

    }


    public function userLogout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route("login");
    }

    public function vendorLogout()
    {
        Auth::guard('vendor')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('vendor.login');
    }
}
