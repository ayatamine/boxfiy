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
		<link rel="shortcut icon" href="{{asset('BoxfiyV6/images/logo/5464356.png')}}">
		{{-- <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}"> --}}

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
        @include('layouts.partials.styles')
        @yield('styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
   

    </head>

    <body style="">
   
        @guest 
          @include('layouts.partials.index_navigation') 
        @else 
          @include('layouts.partials.profile_navigation')
        @endguest
        @yield('content')
    
        @isset($slot)
            {{ $slot }}
        @endisset
    
        @livewire('notifications')
        @include('layouts.partials.scripts')
        @yield('scripts')
    </body>
</html>
