<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileForm(Request $request)
    {
        $user = $request->user();

        return view('profile.edit')->with([
            'user' => $user
        ]);
    }

    public function edit()
    {

    }
}
