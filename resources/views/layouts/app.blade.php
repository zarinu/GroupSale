<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#b91c1c"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- css template files -->
    <link rel="stylesheet" href="{{ asset('assets/css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @stack('styles')
</head>
<body class="bg-gray-50">

<!-- loader -->
<div class="loading" id="loader">
    <div class="loader"></div>
    <img class="loaderImg" src="{{ asset('assets/images/others/logo.png') }}" alt="">
</div>

@include('layouts.partials.header')

<!-- Page Heading -->
@isset($header)
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endisset

<!-- Page Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
@include('layouts.partials.footer')
</body>

<!--DROPDOWNS FOR NAVBAR-->
<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<!--MOBILE NAVBAR-->
<script src="{{ asset('assets/js/navbar.js') }}"></script>
<!-- SHOW MODAL SEARCH -->
<script src="{{ asset('assets/js/searchBox.js') }}"></script>
<!-- Loader -->
<script src="{{ asset('assets/js/loader.js') }}"></script>
@stack('scripts')
</html>