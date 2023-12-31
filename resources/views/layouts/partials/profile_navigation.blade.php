<nav>
    <div class="container">
        <div class="row">
            <div class="nav-content">
                <div class="logo">
                    <img src="{{asset('boxfiyV6/images/logo/133413485_388547598914031_8784098996627337073_n.png')}}">
                </div>

                <div class="nav-elements">
                    <i class="open-mobile-nav fa-solid fa-bars"></i>
                    <ul>
                        <li>
                            <a href="#">wallet</a>
                        </li>
                        <li>
                            <a href="#">add funds</a>
                        </li>
                        <li>
                            <a href="#">order history</a>
                        </li>
                        <li>
                            <a href="#">support</a>
                        </li>
                    </ul>

                    <div class="user-info">
                        <a href="#"><img src="{{asset('boxfiyV6/images/icons/10.png')}}"></a>
                        <img src="{{auth()->user()->thumbnail}}">
                        <div class="info">
                            <h3>Good evening!</h3>
                            <h1>{{fullName()}}</h1>
                        </div>
                    </div>
                </div>



                <div class="mobile-nav">
                    <ul>
                        <i class="close-nav fa-solid fa-xmark"></i>
                      
                        <li>
                            <a href="#">API</a>
                        </li>
                        <li>
                            <a href="#">services</a>
                        </li>
                        @guest
                            
                        <li id="login">
                            <a href="{{route('login')}}">login</a>
                        </li>
                        <li id="signin">
                            <a href="{{route('register')}}">signup</a>
                        </li>
                        @else
                        <div class="user-info">
                            <a href="#"><img src="{{asset('boxfiyV6/images/icons/10.png')}}"></a>
                            <img src="{{auth()->user()->thumbnail}}">
                            <div class="info">
                                <h3>Good evening!</h3>
                                <h1>{{fullName()}}</h1>
                            </div>
                        </div>
                        @endguest

                    </ul>
                </div>


            </div>
        </div>
    </div>

</nav>