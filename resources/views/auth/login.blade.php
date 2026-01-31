@extends('layouts.auth')
@section('title', 'ورود')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-2">
            <a href="/">
                <img src="{{ asset('assets/images/others/logo.png') }}" alt="" class="w-36 mx-auto">
            </a>
        </div>
        <div class="opacity-80 text-lg mb-5">
            ورود
        </div>

        <div class="mb-4">
            <div class="text-xs opacity-70 mb-2">
                ایمیل خود را وارد کنید
            </div>

            <label>
                <input
                        name="email"
                        type="text"
                        value="{{ old('email') }}"
                        class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center
                   @error('email') border border-red-500 ring-1 ring-red-500 @enderror"
                >
            </label>

            @error('email')
            <div class="text-red-500 text-xs mt-1 text-center">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <div class="text-xs opacity-70 mb-2">
                رمز عبور
            </div>

            <label>
                <input
                        name="password"
                        type="password"
                        class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center
                   @error('password') border border-red-500 ring-1 ring-red-500 @enderror"
                >
            </label>

            @error('password')
            <div class="text-red-500 text-xs mt-1 text-center">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="text-center mt-5 mb-3">
            <button class="bg-red-500 hover:bg-red-600 transition text-white opacity-80 rounded-2xl w-full py-2" type="submit">
                ورود
            </button>
        </div>
        <div class="text-xs opacity-80">
            ثبت نام یا ورود شما به منظور پذیرش
            <a href="#" class="text-red-500">قوانین و مقررات</a>
            ایران مارکت می باشد
        </div>
    </form>
@endsection