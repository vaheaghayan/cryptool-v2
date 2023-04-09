<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Mail\EmailVerify;
use App\Models\User\User;
use App\Models\User\UserToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'auth' => __('Incorrect Email')
            ]);
        }

        $token = $this->generateToken();

        UserToken::create([
            'user_id' => $user->id,
            'type' => UserToken::TYPE_PASSWORD_RESET,
            'token' => $token,
            'is_used' => UserToken::STATUS_NOT_USED
        ]);

        $url = url(cLng() . '/user/password-reset/complete/' . $token);

        Mail::to($user)->send(new EmailVerify($user, $url));

        return response()->json([
            'status' => 'OK',
            'data' => [
                'redirect_url' => url(cLng() . '/user/forgot-password/success')
            ]
        ]);
    }

    public function forgotPasswordSuccess()
    {
        return view('auth.notification')->with([
            'message' => 'Password reset link has been sent to the email address'
        ]);
    }
    private function generateToken()
    {
        $token = Str::random(40);

        if (UserToken::where('token', $token)->first()) {
            return $this->generateToken();
        }

        return $token;
    }

}
