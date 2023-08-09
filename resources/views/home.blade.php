@extends('layouts.app')

@section('content')

    <!-- Start Landing Section -->

    <section class="landing">
        <div class="container">
            <div class="row">
                <div class="landing-content">
                    <div class="text">
                        <h1>#1 SMM PANEL IN THE WORLD FOR <span class="yellow">8 YEARS!</span></h1>
                        @guest
                        <livewire:home-login>
                        <a href="{{route('password.request')}}">forget password?</a>

                        @endguest
                    </div>

                    <div class="images">
                        <img data-aos="fade-left" src="{{asset('BoxfiyV6/images/icons/3.png')}}">
                        <img src="{{asset('BoxfiyV6/images/icons/2.png')}}">
                        <img data-aos="fade-right" src="{{asset('BoxfiyV6/images/icons/4.png')}}">

                    </div>
                </div>
                @guest
                <div class="signup-text">
                    <h2>Don't have an account?</h2>
                    <a href="{{route('register')}}">SIGNUP NOW!</a>
                </div>
                @endguest
            </div>
        </div>
    </section>




    <!-- End Landing Section -->


    <!-- Start Stats Section -->
    <section id="one-home" class="stats">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="stat-content">
                        <div class="stat">
                            <img src="{{asset('BoxfiyV6/images/icons/11.png')}}">
                            <div class="stat-info">
                                <h1>Total Order</h1>
                                <h2>72,775</h2>
                            </div>
                        </div>


                        <div class="stat">
                            <img src="{{asset('BoxfiyV6/images/icons/12.png')}}">
                            <div class="stat-info">
                                <h1>Happy Customers</h1>
                                <h2>72,775</h2>
                            </div>
                        </div>



                        <div class="stat">
                            <img src="{{asset('BoxfiyV6/images/icons/13.png')}}">
                            <div class="stat-info">
                                <h1>Stable Services</h1>
                                <h2>72,775</h2>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div id="two-home" class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="choose-us">
                        <h1>Why Choose Boxfiy?</h1>
                        <p>Boxfiy has provided the highest quality e-marketing solutions and strategies on social networks, such as buying Instagram followers, buying Twitter followers or increasing Instagram followers, foreign or Arab, retweet and favorite
                            your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok likes, Google Plus and YouTube views services to enhance your presence on the network in the web world. What
                            we provide from our high-quality services, you can easily achieve what you aspire to, and you can achieve high sales for your business or your site. We have a team consisting of highly experienced and professional people who
                            perform services with extensive experience and remarkable distinction so that you get the best results for your personal account or for the company's account.</p>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="choose-us">
                        <img src="{{asset('BoxfiyV6/images/icons/5.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- End Stats Section -->


    <!-- Start About Section -->
    <section class="about-section">
        <div id="three-home" class="container">
            <div class="row">
                <h1>What are your privileges?</h1>

                <div class="slider-container">
                    <button class="about-slider-left"><i class="fa-solid fa-angle-left"></i></button>
                    <div class="about-slider">
                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>


                        <div class="slide">
                            <div class="slide-content">
                                <img src="{{asset('BoxfiyV6/images/icons/16.png')}}">
                                <div class="info">
                                    <h3>FAST</h3>
                                    <p>favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="about-slider-right"><i class="fa-solid fa-chevron-right"></i></button>
                </div>


            <!--Start Payment Ways-->

            <div id="four-home" class="container">
                <div class="row col-6">
                    <h1>Payment Ways Which We have?</h1>
    
                    <div class="slider-container">
                        <button class="payment-slider-left"><i class="fa-solid fa-angle-left"></i></button>
                        <div class="payment-slider">
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/visa.png')}}">
                                   
                                </div>
                            </div>
    
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/paypal.png')}}">
                                
                                </div>
                            </div>
    
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/master card.png')}}">
                                 
                                </div>
                            </div>
    
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/bank.png')}}">
                                  
                                </div>
                            </div>
    
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/bitcoin.png')}}">
                                 
                                </div>
                            </div>
    
    
                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/ebay.png')}}">
                                
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/haram.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/moroco.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/payeer.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/perfect.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/space.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/stc.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/vodafone.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/zain eraak.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/zain.png')}}">
                                  
                                </div>
                            </div>

                            <div class="slide">
                                <div class="slide-content">
                                    <img src="{{asset('BoxfiyV6/images/paymentsWays/western.png')}}">
                                  
                                </div>
                            </div>

                           
                        </div>
                        <button class="payment-slider-right"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
    
                    <!--End Payment ways-->

            </div>


        


           

        </div>
        <div id="five-home" class="container">
            <div style="margin-top: 80px;" class="row">

                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="rate-content">
                        <h1>What Our Beloved Customers Say About Us ?</h1>
                        <img src="{{asset('BoxfiyV6/images/icons/6.png')}}">
                    </div>
                </div>


                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="rate-content">
                        <div class="rate-slider-container">
                            <div class="rate-slider">
                                <div class="slide">
                                    <div class="rate-slide-content">
                                        <div class="user-info">
                                            <img src="{{asset('BoxfiyV6/images/user.png')}}">
                                            <h3>Eman sultan</h3>
                                        </div>

                                        <p>Boxfiy has provided the highest quality e-marketing solutions and strategies on social networks, such as buying Instagram followers, buying Twitter followers or increasing Instagram followers, foreign or Arab, retweet
                                            and favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok likes,
                                        </p>
                                        <div class="rate-box">
                                            <ul class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </ul>
                                            <h2>High quality suppourt</h2>
                                        </div>
                                    </div>
                                </div>



                                <div class="slide">
                                    <div class="rate-slide-content">
                                        <div class="user-info">
                                            <img src="{{asset('BoxfiyV6/images/user.png')}}">
                                            <h3>Eman sultan</h3>
                                        </div>

                                        <p>Boxfiy has provided the highest quality e-marketing solutions and strategies on social networks, such as buying Instagram followers, buying Twitter followers or increasing Instagram followers, foreign or Arab, retweet
                                            and favorite your tweets to reach the largest number of audience, buy Tik Tok followers, increase Tik Tok views, increase Tik Tok likes,
                                        </p>
                                        <div class="rate-box">
                                            <ul class="stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </ul>
                                            <h2>High quality suppourt</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="arrows">
                                <button class="rate-slider-left"><i class="fa-solid fa-angle-left"></i></button>
                                <button class="rate-slider-right"><i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>



    <!-- End About Section -->

@endsection