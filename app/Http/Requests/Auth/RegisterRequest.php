<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->symbols()->numbers()],
            'password_confirmation' => 'required'
        ];
    }
}
