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
                <div class="coin-content">
                    <img src="{{asset('BoxfiyV6/images/icons/8.png')}}">
                    <h1>0 <span>coin</span></h1>
                    <a href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="coin-content">
                    <img src="{{asset('BoxfiyV6/images/icons/9.png')}}">
                    <h1>Professional</h1>
                    <a class="special" href="#">!</a>
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
                                        <input wire:model.defer="selected_service_quantity.{{$service->id}}" required oninput="rangevalue.value=value,rangeprice.value=((value* {{$service->price}})/{{$service->rate}})" value="{{$service->min_qte}}" min="{{$service->min_qte}}" max="{{$service->max_qte}}" type="range">
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
