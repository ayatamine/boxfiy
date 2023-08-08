<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
        @include('layouts.partials.styles')
        @yield('styles')
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
   

    </head>

    <body
    @switch(Request::segment(1))
        @case('register')
        style="background-image: linear-gradient(1300deg,#dd8500,#0d0d19,#0d0d19,#0d0d19,#0d0d19,#0d0d19,#fe9900,#fe9900);"
            @break
        @case('profile')
        @case('about-us')
        @case('privacy-policy')
        @case(\Str::contains(Request::segment(1),'term'))
            style=""
            @break
        @default
        style="background-image: linear-gradient(600deg,#dd8500,#0d0d19,#0d0d19,#0d0d19,#fe9900,#fe9900,#fe9900);" 

    @endswitch 
   >
        @include('layouts.partials.index_navigation')
        @yield('body')
        @include('layouts.partials.scripts')
        @yield('scripts')
    </body>
</html>
