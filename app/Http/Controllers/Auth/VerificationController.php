<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        $token = $request->route()->parameter('token');

        $userToken = UserToken::where('is_used', UserToken::STATUS_NOT_USED)
            ->where('type', UserToken::TYPE_REGISTER)
            ->where('token', $token)
            ->first();

        if (!$userToken) {
            abort(404);
        }

        DB::transaction(function () use ($userToken){
            $userToken->update([
                'is_used' => UserToken::STATUS_USED
            ]);

            User::where('id', $userToken->user_id)->update([
                'status' => User::STATUS_VERIFIED,
            ]);
        });

        return view('auth.notification')->with([
            'message' => __('cryptool.verification.success')
        ]);
    }
}
