<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        // INI BELOM BISA KEUPDATE
        // $validated = $request->validateWithBag('updatePassword', [
        //     'current_password' => ['required', 'current_password'],
        //     'password' => ['required', Password::defaults(), 'confirmed'],
        // ]);

        // $profile = User::where('id', $request->id)
        //     ->update([
        //         'password' => Hash::make($validated['password'])
        //     ]);

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        //jika current password  sama dengan password user sekarang
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($request->password)
            ]);
            // return back()->with('success', 'your password has been updated');
            return back()->with('status', 'password-updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'your current password does not match with our record',
        ]);

        // $validated = $request->validateWithBag('updatePassword', [
        //     'current_password' => ['required', 'current_password'],
        //     'password' => ['required', Password::defaults(), 'confirmed'],
        // ]);

        // $request->user()->update([
        //     'password' => Hash::make($validated['password']),
        // ]);

        // throw ValidationException::withMessages([
        //     'current_password' => 'your current password does not match with our record',
        // ]);
    }
}
