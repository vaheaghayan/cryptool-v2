<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\EmailVerify;
use App\Models\User\User;
use App\Models\User\UserToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = new User($validatedData);
        $token = $this->generateToken();

        DB::transaction(function () use ($user, $token) {
            $user->save();

            UserToken::create([
                'user_id' => $user->id,
                'type' => UserToken::TYPE_REGISTER,
                'token' => $token,
                'is_used' => UserToken::STATUS_NOT_USED
            ]);
        });

        $url = url(cLng() . '/user/sign-up/complete/' . $token);

        Mail::to($user)->send(new EmailVerify($user, $url));

        return response()->json([
            'status' => 'OK',
            'data' => [
                'redirect_url' => url(cLng() . '/user/sign-up/success')
            ]
        ]);
    }

    public function registerSuccess()
    {
        return view('auth.notification')->with([
            'message' => __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')
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
