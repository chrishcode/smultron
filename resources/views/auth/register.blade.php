@extends('layouts.app')

@section('content')
<div class="flex h-screen justify-center items-center -m-24">
    <div class="w-3/12 text-center">
        <p class="mb-4">Register</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mb-2 bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-2 bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-2 bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input id="password-confirm" type="password" class="form-control mb-2 bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">


            <button type="submit" class="w-full outline-none mt-4 bg-gray-100 px-1 py-2 rounded text-gray-500 focus:shadow-none">
                {{ __('Register') }}
            </button>
        </form>
        </div>
    </div>
@endsection
