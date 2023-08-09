<div class="container">
<!--Start header -->
<div class="header-section">
    <div class="row !mx-0 justify-content-center flex justify-center">
        <section style="padding:35px;margin-top: 190px;" class="head-section col-10 col-lg-11 ">
            <h1 style="font-size: 44px;">View our Services. If you need something Custom, let us know!</h1>
            <p style="font-size: 15px;">Let us know if you are a reseller or marketing company. Please register and open a ticket to request a Reseller Service List.</p>
        </section>
    </div>

    <div id="filter-container" class="row !mx-0 flex justify-center justify-content-center ">
        <section class="filter-box col-10 col-lg-11">
            <div class="row !mx-0 justify-content-center flex items-center justify-center gap-6">
                <div wire:click.prefetch="loadCategories" class="selection-btn mr-20 !mb-0 col-11 col-md-5 col-lg-3"><h3 style="display: inline;">Filter</h3> <speacer></speacer><i class="fa-solid fa-arrow-down"></i>
                <ul id="listone" class="left-0">

                    <li style="color: white;">All</li>
                    @if($categories)
                    @foreach ($categories as $c)
                            <li class="text-2xl" value="{{$c->id}}">{{$c->name}}</li>
                    @endforeach
                    @endif
                  
                </ul>
                </div>



                 
    
                    <div class=" col-11 col-lg-5">
                        <div id="search-section" class="row align-items-center justify-content-center">
                        <i class="fa-solid fa-magnifying-glass col-3"></i>
                        <input class="search-box col-6 !mt-0" placeholder="Search In Services" type="search">
                        </div>
                    </div>
            </div>

        
        </section>
        
    </div>

</div>

<!--end header -->

<!--Start Services-->
<section id="services" class="services grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-5 ">
    <!--card 1-->
<div class="">
<div class="card">
    <div class="imgBx">
        <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
    </div>

    <div class="contentBx">
<h2>Digital Marketing</h2>

        <div class="price">
            <h3>price : 300$</h3>
          
        </div>

        <div class="time">

            <h3>Avg. Time : 2 Days</h3>
            
        </div>
        <a href="#">Buy Now</a>
    </div>
</div>
</div>
    <!--card 1-->


        <!--card 2-->
<div class="">
    <div class="card">
        <div class="imgBx">
            <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
        </div>
    
        <div class="contentBx">
    <h2>Digital Marketing</h2>
    
            <div class="price">
                <h3>price : 300$</h3>
              
            </div>
    
            <div class="time">
    
                <h3>Avg. Time : 2 Days</h3>
                
            </div>
            <a href="#">Buy Now</a>
        </div>
    </div>
    </div>
        <!--card 2-->

            <!--card 3-->
<div class="">
    <div class="card">
        <div class="imgBx">
            <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
        </div>
    
        <div class="contentBx">
    <h2>Digital Marketing</h2>
    
            <div class="price">
                <h3>price : 300$</h3>
              
            </div>
    
            <div class="time">
    
                <h3>Avg. Time : 2 Days</h3>
                
            </div>
            <a href="#">Buy Now</a>
        </div>
    </div>
    </div>
        <!--card 3-->
            <!--card 4-->
<div class="">
    <div class="card">
        <div class="imgBx">
            <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
        </div>
    
        <div class="contentBx">
    <h2>Digital Marketing</h2>
    
            <div class="price">
                <h3>price : 300$</h3>
              
            </div>
    
            <div class="time">
    
                <h3>Avg. Time : 2 Days</h3>
                
            </div>
            <a href="#">Buy Now</a>
        </div>
    </div>
    </div>
        <!--card 4-->
            <!--card 5-->
<div class="">
    <div class="card">
        <div class="imgBx">
            <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
        </div>
    
        <div class="contentBx">
    <h2>Digital Marketing</h2>
    
            <div class="price">
                <h3>price : 300$</h3>
              
            </div>
    
            <div class="time">
    
                <h3>Avg. Time : 2 Days</h3>
                
            </div>
            <a href="#">Buy Now</a>
        </div>
    </div>
    </div>
        <!--card 5-->
            <!--card 6-->
<div class="">
    <div class="card">
        <div class="imgBx">
            <img src="{{asset('BoxfiyV6/images/photo-product.svg')}}" alt="">
        </div>
    
        <div class="contentBx">
    <h2>Digital Marketing</h2>
    
            <div class="price">
                <h3>price : 300$</h3>
              
            </div>
    
            <div class="time">
    
                <h3>Avg. Time : 2 Days</h3>
                
            </div>
            <a href="#">Buy Now</a>
        </div>
    </div>
    </div>
        <!--card 6-->
</section>
<!--end Services-->
</div>
