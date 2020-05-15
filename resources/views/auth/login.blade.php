@extends('layouts.app')

@section('content')
    <div class="flex h-screen justify-center items-center -m-24">
        <div class="w-3/12 text-center">
            <p class="mb-4">Login</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-2 bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-gray-100 border-none text-gray-500 focus:bg-gray-100 focus:shadow-none" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <button type="submit" class="w-full outline-none mt-4 bg-gray-100 px-1 py-2 rounded text-gray-500 focus:shadow-none">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
@endsection
