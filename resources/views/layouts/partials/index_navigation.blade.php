<nav>
    <div class="container">
        <div class="row">
            <div class="nav-content">
                <div class="logo"><img src="{{asset('BoxfiyV6/images/logo/133413485_388547598914031_8784098996627337073_n.png')}}">
                </div>


                <div class="nav-elements">

                    <ul>
                        <li>
                            <a href="{{route('about')}}">About Us</a>
                        </li>
                        <li>
                            <a href="{{route('terms')}}">Terms</a>
                        </li>
                        <li>
                            <a href="{{route('privacy')}}">Privacy</a>
                        </li>

                        <li>
                            <a href="api.html">API</a>
                        </li>
                        <li>
                            <a href="{{route('services')}}">Services</a>
                        </li>
                        @auth   
                        <div class="user-info">
                            <a href="{{route('notifications')}}"><img src="{{asset('boxfiyV6/images/icons/10.png')}}"></a>
                            <a href="{{route('profile')}}">
                                <img src="{{auth()->user()->thumbnail}}">
                            </a>
                            <a href="{{route('profile')}}" class="info">
                                <h3>{{DayTime()}}</h3>
                                <h1>{{fullName()}}</h1>
                                <span class="logout-dropdown">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </span>
                            </a>
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
                            <a href="{{route('about')}}">About Us</a>
                        </li>


                        <li>
                            <a href="{{route('terms')}}">Terms</a>
                        </li>
                        <li>
                            <a href="{{route('privacy')}}">Privacy</a>
                        </li>


                        <li>
                            <a href="api.html">API</a>
                        </li>


                        <li>
                            <a href="{{route('services')}}">Services</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </nav>