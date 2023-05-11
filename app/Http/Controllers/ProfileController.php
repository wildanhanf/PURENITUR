<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd([
        //     $request->id,
        //     $request->username,
        //     $request->email,
        //     $request->first_name,
        //     $request->last_name,
        //     $request->gender,
        //     $request->telephone,
        // ]);

        $profile = User::where('id', $request->id)
            ->update([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'telephone' => $request->telephone,
            ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
