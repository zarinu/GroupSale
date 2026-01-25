<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex justify-center items-center text-right h-screen w-96 mx-auto">
    <div class="shadow-xl rounded-2xl p-8 bg-white">
        @yield('content')
    </div>
</div>
</body>
</html>