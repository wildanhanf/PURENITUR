@extends('landing.base')
@section('landing.content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <input id="id" type="hidden" name="id" value="{{ old('id', $user->id) }}" required readonly>
                        </div>


                        <div class="mb-1.5 text-xs text-left">
                            <label for="email" style="color:white">Email</label>
                            <input id="email" type="email" class="border-solid border-2 rounded border-slate-300 w-full" name="email" value="{{ old('email', $user->email) }}" required readonly>
                            @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="username" style="color:white">Username</label>
                            <input id="username" type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="username" value="{{ old('username', $user->username) }}" required>
                            @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="first_name" style="color:white">First Name</label>
                            <input id="first_name" type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                            @if ($errors->has('first_name'))
                            <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="last_name" style="color:white">Last Name</label>
                            <input id="last_name" type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                            @if ($errors->has('last_name'))
                            <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="gender" style="color:white">Gender<br></label>
                            <input id="gender" type="text" class="border-solid border-2 rounded border-slate-300 w-10 text-center" name="gender" value="{{ old('gender', $user->gender) }}" required readonly>
                            @if ($errors->has('gender'))
                            <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="telephone" style="color:white">Telephone</label>
                            <input id="telephone" type="number" class="border-solid border-2 rounded border-slate-300 w-full" name="telephone" value="{{ old('telephone', $user->telephone) }}" required>
                            @if ($errors->has('telephone'))
                            <span class="text-danger text-left">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>
                            @if (session('status')==='profile-updated' )
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Update Password (CONTROLLER NYA BELOM JALAN, DATA GA KEUPDATE)') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div class="mb-1.5 text-xs text-left">
                            <label for="current_password" style="color:white">Current Password</label>
                            <input id="current_password" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="current_password" autocomplete="current-password">
                            @if ($errors->has('current_password'))
                            <span class="text-danger text-left">{{ $errors->first('current_password') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="password" style="color:white">New Password</label>
                            <input id="password" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password" autocomplete="password">
                            @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-1.5 text-xs text-left">
                            <label for="password_confirmation" style="color:white">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password_confirmation" autocomplete="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
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

        <div class="flex items-center gap-4">
            <button class="button"><a href="{{ route('logout.perform') }}">{{ __('Logout') }}</a></button>
        </div>
    </div>
</div>
@endsection