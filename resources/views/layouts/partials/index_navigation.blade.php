<nav>
    <div class="container">
        <div class="row">
            <div class="nav-content">
                <div class="logo"><img src="{{asset('BoxfiyV6/images/logo/133413485_388547598914031_8784098996627337073_n.png')}}">
                </div>


                <div class="nav-elements">

                    <ul>
                        <li>
                            <a href="About-us.html">About Us</a>
                        </li>


                        <li>
                            <a href="Terms.html">Terms</a>
                        </li>

                        <li>
                            <a href="api.html">API</a>
                        </li>


                        <li>
                            <a href="Services.html">Services</a>
                        </li>
                        @auth   
                        <div class="user-info">
                            <a href="#"><img src="{{asset('boxfiyV6/images/icons/10.png')}}"></a>
                            <img src="{{asset('boxfiyV6/images/user.png')}}">
                            <div class="info">
                                <h3>Good evening!</h3>
                                <h1>{{auth()->user()->name}}</h1>
                            </div>
                        </div>
                        @else
                        <li id="login">
                            <a href="{{route('login')}}">Login</a>
                        </li>

                        <li id="signin">
                            <a href="{{route('register')}}">Sign up</a>
                        </li>
                         @endauth
                    </ul>
                    <i class="open-mobile-nav fa-solid fa-bars"></i>

                </div>


                <div class="mobile-nav">
                    <ul>
                        <li style="list-style: none"><i class="close-nav fa-solid fa-xmark"></i>
                        </li>


                        <li>
                            <a href="About-us.html">About Us</a>
                        </li>


                        <li>
                            <a href="Terms.html">Terms</a>
                        </li>


                        <li>
                            <a href="api.html">API</a>
                        </li>


                        <li>
                            <a href="Services.html">Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </nav>