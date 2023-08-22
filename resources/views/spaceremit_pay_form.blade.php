@extends('layouts.profile')
@section('title','Pay with spaceRemit')

@section('content')
<section class="signup">
    <div class="container">
        <div class="row">
            <div class="signup-content">
                <div class="text">
                    <h1>#1 SMM PANEL IN THE WORLD FOR <span class="yellow">8 YEARS!</span></h1>

                    <form action="" method="" wire:submit.prevent="register">
                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/17.png')}}"></label>
                            <input  wire:model.lazy="username" autofocus  placeholder="username" type="text" name="" class="">
                            @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/18.png')}}"></label>
                            <input wire:model.lazy="email" placeholder="Email" type="email" name="" class="">
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/18.png')}}"></label>
                            <input wire:model.lazy="password" placeholder="Password" type="password" name="" class="">
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/18.png')}}"></label>
                            <input wire:model.lazy="passwordConfirmation" placeholder="Password" type="password" name="" class="">
                        </div>

                        <button type="submit">
                            signup
                            <span wire:loading class="animate-bounce">...</span>
                        </button>
                    </form>
                </div>

                <div class="images">
                    <img src="{{asset('boxfiyV6/images/icons/3.png')}}">
                    <img src="{{asset('boxfiyV6/images/icons/2.png')}}">
                    <img src="{{asset('boxfiyV6/images/icons/4.png')}}">

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
