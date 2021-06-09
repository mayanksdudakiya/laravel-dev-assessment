<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->user_role === config('settings.roles.user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required|Mimes:jpeg,jpg,gif,png|dimensions:width=256,height=256',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'password' => 'min:6',
        ];
    }
}
