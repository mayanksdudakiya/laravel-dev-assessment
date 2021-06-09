<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VerifyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if(!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();
        
        if (!empty($user->otp)):
            return response()->json(['msg' => 'You are unauthorized, please verify your account.'], 401 );
        endif;
        // Create new client or just return token
        $success['token'] =  $user->createToken('Practicle')->accessToken;

        return response()->json(['msg' => 'Successfully logged in', 'data' => $success], 200 );
    }

    public function verify(VerifyRequest $request)
    {
        $user = User::where('otp', $request->otp)->first();

        $user->otp = null;

        $user->save();

        return response()->json(['msg' => 'Account successfully verified'], 200 );
    }
}
