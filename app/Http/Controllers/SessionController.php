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

            // $details = [
            //     'name' => Auth::user()->name,
            //     'message' => 'Please verify your email address by clicking on the link we have sent to your email.'
            // ];

            Auth::user()->sendEmailVerificationNotification();



            // dispatch(new SendEmail(Auth::user()->email,"verifyEmail"));
            // SendEmail::dispatch(Auth::user()->email, $details);
            return redirect()->route("verify.email");
        }

        request()->session()->regenerate();

        return redirect("/shop");

    }
}
