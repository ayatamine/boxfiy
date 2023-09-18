<section class="wallet">
    <div class="container">
        @if (session()->has('success'))
            <x-dissmissable-alert type="success">
                {{ session('success') }}
            </x-dissmissable-alert>
        @elseif(session()->has('error'))
            <x-dissmissable-alert type="error">
                {{ session('error') }}
            </x-dissmissable-alert>
        @endif 
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" wire:ignore>
                <div class="balance-content">
                    <div class="balance">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <div class="info">
                            <h1>{{auth()->user()->wallet_balance}} <span class="currency">USD</span></h1>
                            <h2>Balance</h2>
                        </div>
                    </div>

                    <div class="balance">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <div class="info">
                            <h1>{{auth()->user()->wallet_balance}} <span class="currency">USD</span></h1>
                            <h2>Balance</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="coin-content" x-data="{ modelOpen: false }"  x-cloak>
                    <img src="{{asset('BoxfiyV6/images/icons/8.png')}}">
                    <h1>{{auth()->user()->award_points}} <span>coin</span></h1>
                    {{-- <a href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i></a> --}}
                    <a @click="modelOpen =!modelOpen"  class="special" href="#">!</a>
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
                                class="inline-block w-full md:w-4/5 mx-auto p-8 my-20 overflow-hidden text-left transition-all transform bg-[#15182C] dark:bg-gray-800 text-white rounded-lg shadow-xl 2xl:max-w-2xl"
                            >
                                <div class="flex items-center justify-between space-x-4">
                                    {{-- <h1 class="text-xl font-medium text-gray-800 ">Compare plans</h1> --}}
                
                                    <button @click="modelOpen = false" class=" focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>
                
                                <section class="">
                                    <div class="container px-6 py-8 mx-auto">
                                        <div class="sm:flex sm:items-center sm:justify-between">
                                            <div>
                                                <h2 class="h3 font-bold">Points System</h2>
                                                {{-- <p class="mt-4 text-gray-500 dark:text-gray-400">No Contracts. No surorise fees.</p> --}}
                                            </div>
                                        </div>
                                        {{-- points on orders --}}
                                        <div class=" mt-16 -mx-6  ">
                                            <div class="px-6 py-6 transition-colors duration-200 transform bg-gray-700 rounded-lg dark:bg-gray-600">
                                                {{-- <p class="text-3xl font-medium text-gray-100">{{$item->title}}</p> --}}
                                                {{-- <h4 class="mt-2 text-4xl font-semibold text-gray-100">$99 <span class="text-base font-normal text-gray-400">/ Month</span></h4> --}}
                                                {{-- <p class="mt-4 text-gray-300">{{$item->description}}</p> --}}
                            
                                                <div class="mt-8 space-y-8">
                                                    <div class="flex items-center" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#F38E06]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                            
                                                        <span class="mx-4 text-gray-400 h4 leading-7">Order less then 0.5$ dollars are equivalent to {{env('FIRST_POINTS_INTERVAL')}} point</span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mt-8 space-y-8">
                                                    <div class="flex items-center" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#F38E06]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                            
                                                        <span class="mx-4 text-gray-400 h4 leading-7">Order between 0.5 then 1$ dollars are equivalent to {{env('SECOND_POINTS_INTERVAL')}} point</span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mt-8 space-y-8">
                                                    <div class="flex items-center" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-[#F38E06]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                            
                                                        <span class="mx-4 text-gray-400 h4 leading-7">Order more then 1$ dollars are equivalent to {{env('THIRD_POINTS_INTERVAL')}} point</span>
                                                    </div>
                                                    
                                                </div>
                            
                                                
                                            </div>
                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="coin-content" x-data="{ modelOpen: false }" x-cloak>
                    <img src="{{asset('BoxfiyV6/images/icons/9.png')}}">
                    <h1>Professional</h1>
                    <a @click="modelOpen =!modelOpen"  class="special" href="#">!</a>
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
                                class="inline-block w-full md:w-4/5 mx-auto p-8 my-20 overflow-hidden text-left transition-all transform bg-[#15182C] dark:bg-gray-800 text-white rounded-lg shadow-xl 2xl:max-w-2xl"
                            >
                                <div class="flex items-center justify-between space-x-4">
                                    {{-- <h1 class="text-xl font-medium text-gray-800 ">Compare plans</h1> --}}
                
                                    <button @click="modelOpen = false" class=" focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>
                
                                <section class="">
                                    <div class="container px-6 py-8 mx-auto">
                                        <div class="sm:flex sm:items-center sm:justify-between">
                                            <div>
                                                <h2 class="h3 font-bold">Award on orders</h2>
                                                {{-- <p class="mt-4 text-gray-500 dark:text-gray-400">No Contracts. No surorise fees.</p> --}}
                                            </div>
                                        </div>
                            
                                        <div class="grid gap-6 mt-16 -mx-6 sm:gap-8 sm:grid-cols-2 lg:grid-cols-4 ">
                                            @foreach (\App\Models\AccountDegree::get() as $item)
                                            <div class="px-6 py-6 transition-colors duration-200 transform bg-gray-700 rounded-lg dark:bg-gray-600">
                                                <p class="text-3xl font-medium text-gray-100">{{$item->title}}</p>
                                                {{-- <h4 class="mt-2 text-4xl font-semibold text-gray-100">$99 <span class="text-base font-normal text-gray-400">/ Month</span></h4> --}}
                                                <p class="mt-4 text-gray-300">{{$item->description}}</p>
                            
                                                <div class="mt-8 space-y-8">
                                                    @forelse ($item->properties as $property)
                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#F38E06]" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                            
                                                        <span class="mx-4 text-gray-400 text-xl">{{$property['property']}}</span>
                                                    </div>
                                                    @empty
                                                    <div class="flex items-center">
                                                        <span class="mx-4 text-gray-400 text-xl">No feature adde yet</span>
                                                    </div>
                                                    @endforelse
                                                    
                                                </div>
                            
                                                
                                            </div>
                                            @endforeach
                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="socials">
                    <button class="social-left-arrow">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>

                    <div class="socials-content" wire:ignore>
                        @foreach ($categories as $c)
                            
                        <a href="#" class="!flex !justify-start gap-3 !items-center !w-fit" wire:click.prevent="$set('category_id',{{$c->id}})" >
                            {{-- <i class="fa-solid fa-heart"></i> --}}
                            <img class="h-10 w-10 rounded-full" src="{{asset($c->image)}}" alt="">
                             {{$c->name}}
                        </a>
                        @endforeach


                    </div>

                    <button class="social-right-arrow">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>


        <div class="row relative">
            
            {{-- <div wire:loading.flex class="w-[97%] rounded-lg absolute bg-gray-800 z-40 top-6 left-7 flex justify-center items-center  h-full text-white text-3xl "  >
                <svg class="animate-spin h-20 w-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            </div> --}}
            <div class="services-container @if(count($services)) !grid  grid-col-1 sm:grid-cols-2 md:grid-cols-4 @endif">
                
                @forelse ($services as $key=>$service)
                    
                <div class="">
                    <div class="service">
                        <div class="upper">
                            <div class="service-info !justify-start">
                                <img src="{{$service->image ?? asset('BoxfiyV6/images/icons/6.png')}}">
                                <div class="info w-full">
                                    <h1>{{$service->name}}</h1>
                                    @if($service->description != '')
                                    <p>
                                        {{  \Illuminate\Support\Str::limit($service->description,45)  }}
                                    </p>
                                    @else 
                                    <p>Price per {{$service->rate}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="details">
                                <ul>
                                    <li><i class="fa-solid fa-check"></i></li>
                                    <li title="normal">@if(in_array($service->quality,['normal','medium','excellent']))<i class="fa-solid fa-check"></i> @endif </li>
                                    <li title="medium">@if(in_array($service->quality,['medium','excellent']))<i class="fa-solid fa-check"></i> @endif</li>
                                    <li title="excellent">@if($service->quality == 'excellent')<i class="fa-solid fa-check"></i> @endif</li>
                                </ul>

                                <div class="price">
                                    <button class="book active"><i class="fa-solid fa-bookmark"></i></button>

                                    <button class="more-details">{{$service->price}}$ <span class="show-quantity">per {{$service->rate}}</span></button>
                                </div>
                            </div>
                        </div>


                        <div class="lower">
                            <form method="" action="" wire:submit.prevent='submitOrder'>
                                <div class="input">
                                    <input wire:model.defer="selected_service_link.{{$service->id}}" placeholder="link" required type="text">
                                    <button type="button" class="past-link"><i class="fa-solid fa-copy"></i></button>
                                </div>
                                <div class="range-details">
                                    <div class="range-input">
                                        <div><span>Quantity</span> <output id="rangevalue">{{$service->min_qte}}</output></div>
                                        <input @disabled($service->rate) wire:model.defer="selected_service_quantity.{{$service->id}}" required oninput="rangevalue.value=value,rangeprice.value=((value* {{$service->price}})/{{$service->rate}})" value="{{$service->min_qte}}" min="{{$service->min_qte}}" max="{{$service->max_qte}}" type="range">
                                    </div>

                                    <div class="price">
                                        <h1><output id="rangeprice">{{$service->min_qte * $service->price}}</output></h1><span>$</span></div>
                                </div>
                                <button type="submit">confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty 
                <div class="bg-[#f38e06]  m-10 p-6 text-white  py-6 rounded">
                    No Service found in this category
                </div>
                @endforelse



            </div>
        </div>
    </div>

</section>
