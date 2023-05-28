@section('title')
Edit Profile
@endsection
@extends('landing.base')
@section('content')
<div class="mt-8">
    <div class="w-full lg:ml-52 sm:px-6 lg:px-8 space-y-6 max-w-6xl">
        <div class="p-4 sm:p-8 bg-white shadow rounded-lg mx-3 border-2 border-slate-800 border-solid lg:flex">
            <div class="w-full lg:flex mb-8">
                <section class="w-full lg:w-2/3 mb-3">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <input id="id" type="hidden" name="id" value="{{ old('id', $user->id) }}" required readonly>
                        </div>


                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="email" class="text-slate-950 mr-10">Email</label>
                            <input id="email" type="email" class="p-1 border-solid border-2 rounded border-slate-300 w-full" name="email" value="{{ old('email', $user->email) }}" required readonly>
                            @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="username" class="text-slate-950 mr-4">Username</label>
                            <input id="username" type="text" class="p-1 border-solid border-2 rounded border-slate-300 w-full" name="username" value="{{ old('username', $user->username) }}" required>
                            @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="first_name" class="text-slate-950 mr-6">First Name</label>
                            <input id="first_name" type="text" class="p-1 border-solid border-2 rounded border-slate-300 w-full" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                            @if ($errors->has('first_name'))
                            <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="last_name" class="text-slate-950 mr-6 ">Last Name</label>
                            <input id="last_name" type="text" class="p-1 border-solid border-2 rounded border-slate-300 w-full" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                            @if ($errors->has('last_name'))
                            <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="gender" class="text-slate-950 mr-8">Gender<br></label>
                            <input id="gender" type="text" class="p-1 border-solid border-2 rounded border-slate-300 w-10 text-center" name="gender" value="{{ old('gender', $user->gender) }}" required readonly>
                            @if ($errors->has('gender'))
                            <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left lg:flex">
                            <label for="telephone" class="text-slate-950 mr-4">Telephone</label>
                            <input id="telephone" type="number" class="p-1 border-solid border-2 rounded border-slate-300 w-full" name="telephone" value="{{ old('telephone', $user->telephone) }}" required>
                            @if ($errors->has('telephone'))
                            <span class="text-danger text-left">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>

                        <div class="flex flex-row-reverse items-center">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>
                            @if (session('status')==='profile-updated' )
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
                <div class="w-full lg:w-1/3 items-center justify-center ">
                    <a href="{{ route('shipment') }}">
                        <div class="w-72 h-14 bg-primary-1 rounded-lg text-center text-white text-md p-3 font-base mb-6 shadow-lg mx-auto">Your Shipment</div>
                    </a>
                    <a href="{{ route('payment') }}">
                        <div class="w-72 h-14 bg-primary-1 rounded-lg text-center text-white text-md p-3 font-base mb-6 shadow-lg mx-auto">Your Payment</div>
                    </a>
                    @if(Auth::user()->is_admin == 1)
                    <a href="{{ route('admin-dashboard') }}">
                        <div class="w-72 h-14 bg-primary-1 rounded-lg text-center text-white text-md p-3 font-base shadow-lg mx-auto">Admin Dashboard</div>
                    </a>
                    @else
                    @endif
                </div>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow rounded-lg mx-3 border-2 border-slate-800 border-solid">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Update Password') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div class="mb-1 text-xs text-left">
                            <label for="current_password" class="text-slate-950">Current Password</label>
                            <input id="current_password" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="current_password" autocomplete="current-password">
                            @if ($errors->has('current_password'))
                            <span class="text-danger text-left">{{ $errors->first('current_password') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left">
                            <label for="password" class="text-slate-950">New Password</label>
                            <input id="password" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password" autocomplete="password">
                            @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-1 text-xs text-left">
                            <label for="password_confirmation" class="text-slate-950">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password_confirmation" autocomplete="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>

                            @if (session('status') === 'password-updated')
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <div class="flex items-center mx-4">
            <button class="text-white bg-primary-1 hover:bg-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><a href="{{ route('logout.perform') }}">{{ __('Logout') }}</a></button>
        </div>
    </div>
</div>
@endsection