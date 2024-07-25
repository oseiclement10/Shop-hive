<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store()
    {
        $validatedAttributes = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
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

        return redirect("/shop");

    }
}
