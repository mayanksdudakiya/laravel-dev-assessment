<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        /*@ Update records */
        $user->name = $request->name;
        $user->avatar = $request->avatar->store('avatars','public');
        $user->email = $request->email;

        /*@ Set password only if exists*/
        if (!empty($request->password)):
            $user->password = Hash::make($request->password);
        endif;

        $user->save();
        
        return response()->json(['msg' => 'Profile successfully updated', 'data' => $user], 200 );
    }
}
