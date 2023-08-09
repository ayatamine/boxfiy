@extends('layouts.base')

@section('body')
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset

    @livewire('notifications')
@endsection