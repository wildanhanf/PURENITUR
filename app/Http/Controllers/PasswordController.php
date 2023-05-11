<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class PasswordController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        // dd([
        //     bcrypt($request->current_password),
        //     bcrypt($request->password),
        //     bcrypt($request->password_confirmation),
        // ]);

        // INI BELOM BISA KEUPDATE
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $profile = User::where('id', $request->id)
            ->update([
                'password' => Hash::make($validated['password'])
            ]);

        return back()->with('status', 'password-updated');
    }
}
