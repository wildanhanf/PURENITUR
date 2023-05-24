@section('title')
Register
@endsection

@extends('layouts.auth-master')

<head>
    @include('landing.head')
</head>
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class=" bg-[url('/img/register-login.png')] h-screen justify-center flex items-center">
    <div class="container">
        <img src="/img/logo.png" class="mx-auto mb-3 w-[108px]" alt="PURENITUR Logo">
        <h1 class="text-lg font-semibold mb-3 text-center">Welcome to PURENITUR</h1>
        <form method="post" action="{{ route('register.perform') }}" class="px-7 py-7 shadow-lg rounded-md max-w-lg items-center mx-auto">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="mb-1.5 text-xs text-left">
                <label for="email">Email address</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="email" class="border-solid border-2 rounded border-slate-300 w-full" name="email" value="{{ old('email') }}" placeholder="" required="required" autofocus>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Username</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="username" value="{{ old('username') }}" placeholder="" required="required" autofocus>
                @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password" value="{{ old('password') }}" placeholder="" required="required">
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingConfirmPassword">Confirm Password</label>
            </div>
            <div>
                <input type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="" required="required">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">First Name</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="first_name" value="{{ old('first_name') }}" placeholder="" required="required" autofocus>
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Last Name</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="last_name" value="{{ old('last_name') }}" placeholder="" required="required" autofocus>
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Gender</label><br>
            </div>
            <div class="mb-1.5 text-xs flex items-start">
                <div class="mr-1">
                    <input type="radio" id="man" name="gender" value="M"" />
                    <label for=" man">Man</label>
                </div>
                <div class="mr-1">
                    <input type="radio" id="woman" name="gender" value="W"" />
                    <label for=" woman">Woman</label>
                </div>
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Address</label>
            </div>
            <div class="mb-1.5 text-xs">
                <input type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="address" value="{{ old('address') }}" placeholder="" required="required" autofocus>
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Telephone</label>
            </div>
            <div class="mb-3 text-xs">
                <input type="number" class="border-solid border-2 rounded border-slate-300 w-full" name="telephone" value="{{ old('telephone') }}" placeholder="" required="required" autofocus>
            </div>

            <button class="w-[270px] h-[35px] bg-[#079992] rounded-full mx-auto text-white" type="submit">Sign Up</button>

            <!-- @include('auth.partials.copy') -->
        </form>
    </div>
</div>
@endsection