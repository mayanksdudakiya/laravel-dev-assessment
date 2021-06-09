<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInvitation;
use App\Mail\Invitation;
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

    public function signUp()
    {
        dd('test');
    }
}
