
@section('title',auth()->user()->name)
@section('content')
    
<section class="profile">
    <div class="container">
        <div class="row">
            <form action="" method="" wire:submit.prevent="updateProfile" enctype="multipart/form-data">
               {{-- <div class="grid grid-cols-1 md:grid-cols-2 "> --}}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="user-image-name">
                        <label for="thumbnail" class="relative cursor-pointer">
                            <span class="w-full text-center absolute bottom-0 left-0 bg-blue-400 text-white">Change</span>
                            <img @if(!$tomporary_image) src="{{auth()->user()->thumbnail}}" @else src="{{ $thumbnail->temporaryUrl() }}" @endif>
                        </label>
                        <input class="hidden" wire:model="thumbnail" type="file" name="" id="thumbnail">
                        <h1>{{fullName()}}</h1>
                    </div>
                </div>
                {{-- <div class="flex gap-2 items-center ">
                    <button style="font-size: 12px;
                    padding: 12px 10px !important;
                    height: auto !important;
                    width: 42%;margin:0 !important" >Genrate New Key          </button>
                    <input style="font-size: 12px;
                    padding: 12px 10px !important;
                    height: auto !important;margin:0 !important" disabled  wire:model.defer="api_token" type="text" name="" required placeholder="*****************************"> 
                </div> --}}
               {{-- </div> --}}

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