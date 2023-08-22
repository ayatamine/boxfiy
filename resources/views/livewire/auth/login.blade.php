
@section('title', 'Sign in')

<section class="signup">
    <div class="container">
        <div class="row">
            <div class="signup-content">
                <div class="text">
                    <h1>#1 SMM PANEL IN THE WORLD FOR <span class="yellow">8 YEARS!</span></h1>

                    <form action="" method="" wire:submit.prevent="authenticate">

                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/18.png')}}"></label>
                            <input wire:model.defer="email" placeholder="Email" type="email" name="" class="">
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input">
                            <label><img src="{{asset('boxfiyV6/images/icons/18.png')}}"></label>
                            <input wire:model.defer="password" placeholder="Password" type="password" name="" class="">
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <button type="submit">
                            signin
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
            <div class="signup-text">
                <h2>Don't have an account?</h2>
                <a href="{{route('register')}}">SIGNUP NOW!</a>
            </div>

        </div>
    </div>
</section>
