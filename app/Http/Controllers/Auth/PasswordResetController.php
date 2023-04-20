<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Models\User\User;
use App\Models\User\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function passwordResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        $userToken = UserToken::where('type', UserToken::TYPE_PASSWORD_RESET)->where('is_used', UserToken::STATUS_NOT_USED)->where('token', $token)->first();

        if (!$userToken) {
            abort(404);
        }

        return view('auth.reset-password')->with([
            'token' => $token
        ]);
    }

    public function passwordReset(PasswordResetRequest $request)
    {
        $validatedData = $request->validated();
        $token = $validatedData['token'];

        $userToken = UserToken::where('is_used', UserToken::STATUS_NOT_USED)->where('type', UserToken::TYPE_PASSWORD_RESET)->where('token', $token)->first();
        $user = User::where('id', $userToken->user_id)->first();

        DB::transaction(function () use ($userToken, $user,  $validatedData){
            $userToken->update([
                'is_used' => UserToken::STATUS_USED
            ]);

            $user->update([
               'password' => bcrypt($validatedData['password'])
            ]);
        });

        return response()->json([
            'status' => 'OK',
            'data' => [
                'redirect_url' => url(cLng() . '/user/password-reset/success')
            ]
        ]);
    }

    public function passwordResetSuccess()
    {
        return view('auth.notification')->with([
            'message' => __('cryptool.password_reset.success')
        ]);
    }
}
