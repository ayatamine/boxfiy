
@section('title',auth()->user()->name)
@section('content')
    
<section class="profile">
    <div class="container">
        <div class="row">
            <form action="" method="" wire:submit.prevent="updateProfile">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="user-image-name">
                        <img src="{{asset('boxfiyV6/images/user.png')}}">
                        <h1>USER NAME</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="full_name" type="text" name="" required placeholder="Full name">
                        {{-- @error('full_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="oldpassword" type="password" name=""  placeholder="old password">
                        {{-- @error('oldpassword')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="username" type="text" name=""  placeholder="username">
                        {{-- @error('username')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="newpassword" type="password" name=""  placeholder="new password">
                        {{-- @error('newpassword')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="email" type="email" name="" required placeholder="Email">
                        {{-- @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input wire:model.lazy="passwordConfirmation" type="password" name=""  placeholder="new password confirm">

                    </div>
                </div>

                <div class="row">
                    @foreach (['username','full_name','oldpassword','newpassword','email'] as $item)
                    @error($item)
                        <p class="mt-2 mx-6 text-xl text-red-600">{{ $message }}</p>
                    @enderror
                    @endforeach
                    @if (session()->has('success'))
                    <div class="bg-green-500 text-white p-3 py-4 rounded mx-6">
                        {{ session('success') }}
                    </div>
                   @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="submit">Save
                            <span wire:loading class="animate-bounce">...</span>
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</section>