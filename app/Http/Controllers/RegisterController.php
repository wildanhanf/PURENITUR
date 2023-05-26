<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): RedirectResponse
    {
        // dd($request);

        $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username|min:4|max:16',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required|max:1',
            'address' => 'required',
            'telephone' => 'required|max:14'
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'telephone' =>  $request->telephone,
        ]);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
