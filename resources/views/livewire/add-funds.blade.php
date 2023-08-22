<div class="container" x-data="{ modelOpen: false, }">
    @if (session()->has('error'))
            {{-- <div class="bg-red-500 text-white text-2xl p-5 mx-5 py-6 rounded-lg mb-6">
                {{ session('error') }}
                
            </div> --}}
            <x-dissmissable-alert type="error">
                {{ session('error') }}
            </x-dissmissable-alert>
    @endif
    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-5 col-sm-5 mb-5 col-xs-12 col-5">
            <div class="funds-content">
                <h1 style="min-width: 300px;">How you would like to pay?</h1>

                <img src="{{asset('BoxfiyV6/images/icons/7.png')}}">
            </div>
        </div>

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <form action="" method="" wire:submit.prevent="submitAddFund">
                <div class="funds-content">
                    <div class="incrementer">
                        <button type="button" class="plus-btn"><img class="mx-auto" src="{{asset('BoxfiyV6/images/icons/14.png')}}"></button>
                        <div class="price">
                            <input type="number" step="0.00" min="10"  wire:model.defer="amount"  >
                        </div>
        
                        <button type="button" class="minus-btn"><img class="mx-auto"  src="{{asset('BoxfiyV6/images/icons/15.png')}}"> </button>
                    </div>
        
                    <div class="pay-ways" wire:ignore>
                        <ul>
                            <label id="pay1" for="paypal">
                        <img src="{{asset('BoxfiyV6/images/paypal.png')}}">
                    </label>
        
                            <label id="pay2" for="payeer">
                        <img src="{{asset('BoxfiyV6/images/payeer.png')}}">
                        <img class="special" src="{{asset('BoxfiyV6/images/package.png')}}">
                    </label>
        
                            <label id="pay3" for="visa">
                        <img src="{{asset('BoxfiyV6/images/visa.png')}}">
                    </label>
                        
                    <label id="pay4" for="spaceremit" @click.prevent="modelOpen = true">
                        <img src="{{asset('BoxfiyV6/images/space.png')}}">
                        <img class="special" src="{{asset('BoxfiyV6/images/package.png')}}">
                    </label>
        
                            <label id="pay5" for="pay_radio_5"></label>
        
                            <label id="pay6" for="pay_radio_6"></label>
        
        
                        </ul>
        
                        <!-- hidden inputs for previous ul -->
                        <ul class="hidden">
                            <input id="paypal" value="paypal" type="radio" wire:model.defer="payment_method">
                            <input id="payeer" value="payeer" type="radio" wire:model.defer="payment_method">
                            <input id="visa" value="visa" type="radio" wire:model.defer="payment_method">
                            <input id="spaceremit" value="spaceremit" type="radio" wire:model.defer="payment_method">
                            <input id="pay_radio_5" type="radio" wire:model.defer="payment_method">
                            <input id="pay_radio_6" type="radio" wire:model.defer="payment_method">
        
                        </ul>
                    </div>
        
                    <button type="submit">
                        CONTINUE
                        <span wire:loading class="animate-bounce">...</span>
                    </button>
                </div>
            </form>
        </div>



    </div>
    <div >

        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>
    
                <div x-cloak x-show="modelOpen" 
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-4xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-2xl font-medium text-gray-800 ">Credit Ballance with SpaceRemit</h1>
    
                        <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
    
    
                    <form class="mt-5" action="https://spaceremit.com/apipay/" method="POST" accept-charset="utf-8">
                        @csrf
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="{{ $spaceremit_email }}">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="item_name" value="Recharge">
                        <input type="hidden" name="return" value="{{ $spaceremit_return_page }}">
                        <input type="hidden" name="notify_url" value="{{ $spaceremit_notify_page }}">
                        <input type="hidden" name="custom" value="{{ $custom }}">
                        <input type="hidden" name="sp_api_skip_register" value="true">
               

                        <div>
                            <label for="Card_holder_name" class="block text-lg text-gray-700 capitalize dark:text-gray-200">Card Holder Name</label>
                            <input name="sp_api_user_fullname" id="Card_holder_name" placeholder="John Doe" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
    
                        <div class="mt-4">
                            <label for="email" class="block text-lg text-gray-700 capitalize dark:text-gray-200">Card Holder Email</label>
                            <input name="sp_api_user_email" id="email" placeholder="johndoe@example.app" type="email" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        <div class="mt-4">
                            <label for="amount_to_pay" class="block text-lg text-gray-700 capitalize dark:text-gray-200">Amount to charge</label>
                            <input name="amount" id="amount_to_pay" placeholder="0.00" type="number" wire:model.defer="amount" step="0.00" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>
                        
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-3 py-2 text-lg tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                               Process Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


