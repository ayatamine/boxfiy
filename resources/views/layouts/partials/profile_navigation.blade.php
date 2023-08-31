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
                            <a href="{{route('wallet')}}">wallet</a>
                        </li>
                        <li>
                            <a href="{{route('addFunds')}}">add funds</a>
                        </li>
                        <li>
                            <a href="{{route('orders.index')}}">order history</a>
                        </li>
                        <li>
                            <a href="{{route('tickets.index')}}">support</a>
                        </li>
                    </ul>

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
                </div>



                <div class="mobile-nav">
                    <ul>
                        <i class="close-nav fa-solid fa-xmark"></i>
                      
                        <li>
                            <a href="#">API</a>
                        </li>
                        <li>
                            <a href="{{route('services')}}">services</a>
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
                        @endguest

                    </ul>
                </div>


            </div>
        </div>
    </div>

</nav>
