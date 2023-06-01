@section('title')
Login
@endsection

@extends('layouts.auth-master')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="h-screen justify-center flex items-center">
    <div class="container">
        <img src="{{ asset('img/Logo.png') }}" class="mx-auto mb-3 w-[108px]" alt="PURENITUR Logo">
        <h1 class="text-lg font-semibold mb-3 text-center">Good to see you again</h1>
        <form method="post" action="{{ route('login.perform') }}" class="px-7 py-7 shadow-lg rounded-md max-w-lg items-center mx-auto">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            @include('layouts.partials.messages')

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingName">Email or Username</label>
            </div>
            <div class="mb-1.5 text-xs text-left">
                <input type="text" class="border-solid border-2 rounded border-slate-300 w-full" name="username" value="{{ old('username') }}" placeholder="" required="required" autofocus>
                @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="mb-1.5 text-xs text-left">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="mb-3 text-xs text-left">
                <input type="password" class="border-solid border-2 rounded border-slate-300 w-full" name="password" value="{{ old('password') }}" placeholder="" required="required">
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w-[270px] h-[35px] bg-cyan-400 rounded-full mx-auto text-white" type="submit">Sign In</button>

            <div>
                <a href="{{ route('register.show') }}">Register</a>
            </div>

            <!-- @include('auth.partials.copy') -->
        </form>
    </div>
</div>
@endsection