<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Validation\Rules\Password;

class PasswordResetRequest extends Request
{
    public function rules()
    {
        return [
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->symbols()->numbers()],
            'password_confirmation' => 'required',
            'token' => 'required|string'
        ];
    }
}
