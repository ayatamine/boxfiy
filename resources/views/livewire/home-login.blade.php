<form action="" method=""  wire:submit.prevent="authenticate">
    <div  class="input email-home">
        <label><img src="{{asset('BoxfiyV6/images/icons/17.png')}}"></label>
        <input wire:model.lazy="email"  placeholder="Email" type="email" name="" class="">
        @error('email')
        <p class="mt-2 text-base text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div  class="input password-home">
        <label><img src="{{asset('BoxfiyV6/images/icons/18.png')}}"></label>
        <input  wire:model.lazy="password" placeholder="Password" type="password" name="" class="">
        @error('password')
        <p class="mt-2 text-base text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">
        login
        <span wire:loading class="animate-bounce">...</span>
    </button>
</form>