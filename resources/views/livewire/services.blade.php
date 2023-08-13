<div class="container">
<!--Start header -->
<div class="header-section">
    <div class="row  justify-content-center flex justify-center">
        <section style="padding:35px;margin-top: 190px;" class="head-section col-10 col-lg-11 ">
            <h1 style="font-size: 44px;">View our Services. If you need something Custom, let us know!</h1>
            <p style="font-size: 15px;">Let us know if you are a reseller or marketing company. Please register and open a ticket to request a Reseller Service List.</p>
        </section>
    </div>

    <div id="filter-container" class="row flex justify-center justify-content-center ">
        <section class="filter-box col-10 col-lg-11">
            <div class="row !mx-0 justify-content-center flex items-center justify-center gap-6">
                <div  wire:click.prevent.refetch="loadCategories" class="selection-btn mr-20 !mb-0 col-11 col-md-5 col-lg-3"><h3 style="display: inline;">Filter</h3> <speacer></speacer><i class="fa-solid fa-arrow-down"></i>
                <ul id="listone" class="left-0">

                    <li style="color: white;" wire:click.prefetch.prevent="$refresh">All</li>
                    @if($categories)
                    @foreach ($categories as $c)
                            <li class="text-2xl" value="{{$c->id}}" wire:click.prevent="$set('category_id',{{$c->id}})">{{$c->name}}</li>
                    @endforeach
                    @endif
                  
                </ul>
                </div>



                 
    
                    <div class=" col-11 col-lg-5">
                        <div id="search-section" class="row align-items-center justify-content-center">
                        <i class="fa-solid fa-magnifying-glass col-3"></i>
                        <input  wire:model.debounce.1000ms="search" class="search-box col-6 !mt-0" placeholder="Search In Services" type="search">
                        </div>
                    </div>
            </div>

        
        </section>
        
    </div>

</div>

<!--end header -->

<!--Start Services-->
<section id="services" class="relative services grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-5 ">
   <!-- loader -->
   <div wire:loading.flex class="absolute bg-gray-800 z-40 top-0 left-0 flex justify-center items-center w-full h-full text-white text-3xl "  >
    <svg class="animate-spin h-20 w-20 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
   </div>
    <!--card 1-->
    @forelse ($services as $service)
    <div class="">
        <div class="card">
            <div class="imgBx !z-[38]">
                <img class="!z-37" src="{{$service->image ?? asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
            </div>

            <div class="contentBx !z-[38]">
                <h2 class=" my-2">{{$service->name}}</h2>

                <div class="price my-2">
                    <h3>price : {{$service->price}}$</h3>
                
                </div>

                <div class="time  my-2">

                    <h3>Avg. Time : {{$service->avg_time? $service->avg_time.' Days' : 'Not Defined'}} </h3>
                    
                </div>
                <a href="#" class="!z-37">Buy Now</a>
            </div>
        </div>
    </div>
    @empty
        <div class="bg-green-500 text-white text-lg p-4 rounded">No Service Found,Please Try again</div>
    @endforelse
  
    <!--card 1-->


   
</section>
<div class="my-20">
    {{$services->links()}}
</div>
<!--end Services-->
</div>
