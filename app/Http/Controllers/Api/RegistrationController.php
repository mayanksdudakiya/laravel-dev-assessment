<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\UserInvitation;
use App\Mail\Invitation;
use App\Mail\VerifyPin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function signUpInvitation(UserInvitation $request)
    {
        $request->validated();

        $details = [
            'url' => route('signup')
        ];

        Mail::to($request->email)->send(new Invitation($details));

        return response()->json(['msg' => 'Email successfully sent'], 200);
    }

    public function signUp(SignupRequest $request)
    {
        $otp = mt_rand(100000,999999);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'user_role' => config('settings.roles.user'),
            'otp' => $otp,
        ]);

        $details = [
            'otp' => $otp
        ];

        Mail::to($request->username)->send(new VerifyPin($details));
    
        return response()->json(['msg' => 'Otp has been sent to your email address'], 200);
    }
}
