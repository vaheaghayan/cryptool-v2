<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\UserInformation;
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

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'info.institute' => 'string|nullable',
            'info.department' => 'string|nullable',
            'info.course' => 'integer|nullable'
        ]);

        $user = $request->user();
        $user->update([
            'full_name' => $validatedData['full_name']
        ]);

        UserInformation::updateOrCreate(['user_id' => $user->id], $validatedData['info']);

        return redirect()->back();
    }
}
