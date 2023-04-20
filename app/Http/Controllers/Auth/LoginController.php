<?php

namespace App\Http\Controllers\Auth;

use App\BruteForce\BruteForce;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $bruteForce = new BruteForce($validatedData['email']);

        if ($bruteForce->checkBlock()) {
            return response()->json([
                'status' => 'INVALID_DATA',
                'errors' => [
                    'auth' => __('cryptool.errors.login_bruteforce.block')
                ]
            ]);
        }

        if (!Auth::attempt($validatedData)) {
            $bruteForce->addFailed();

            return response()->json([
                'status' => 'INVALID_DATA',
                'errors' => [
                    'auth' => __('cryptool.errors.login.invalid_credentials')
                ]
            ]);
        }

        $bruteForce->reset();

        return response()->json([
            'status' => 'OK',
            'data' => [
                'redirect_url' => url(cLng() . '/homepage')
            ]
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
