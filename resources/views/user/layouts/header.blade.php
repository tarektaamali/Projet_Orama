<header id="header">
    <div id="top-navbar" class="navbar">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="text-link"><i class="fa fa-map-marker"></i><span>1673 Nefza</span></a></li>
                <li><a href="#" class="text-link"><i class="fa fa-phone"></i><span>40486048</span></a></li>
                <li><a href="#" class="text-link"><i class="fa fa-envelope"></i><span>TDS@nems.com</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /Top Header -->

    <!-- Main Header -->
    <div id="main-navbar" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="index.html"><img src="{{asset('user/img/logo.png')}}" alt="logo"></a>
                </div>
                <!-- Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle-btn">
                    <span></span>
                </button>
                <!-- Mobile toggle -->

                <!-- Mobile Search toggle -->
                <button class="search-toggle-btn">
                    <i class="fa fa-search"></i>
                </button>
                <!-- Mobile Search toggle -->
            </div>

            <!-- Search -->
            <!-- Search   <div class="navbar-search">
                     <button class="search-btn"><i class="fa fa-search"></i></button>
                     <div class="search-form">
                         <form>
                             <input type="text" name="search" value="" placeholder="Search">
                             <br>
                             <input type="text" name="search" value="" placeholder="Search">
                             <br><button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                         </form>
                     </div>
                 </div>
                -->

            <!-- Navigation -->
            <ul class="main-navbar nav navbar-nav navbar-right">
                <li><a class="text-link" href="{{route('home')}}"><span>Accueil</span></a> </li>
                <li ><a class="text-link" href="#"><span>Projects</span></a></li>
                <li><a class="text-link" href="#service"><span>Services</span></a></li>
                <li><a class="text-link" href="blog.html"><span>Blog</span></a></li>

                    <li class="has-dropdown"><a class="text-link" href="#service"><span> Espace Client</span></a>
                        <ul class="dropdown">
                        <li>
                            @if (Auth::guest())

                                <a class="fa  fa-sign-in" href="{{ route('login') }}"> Login</a>
                                <a class="fa   fa-sign-out"  href="{{ route('register') }}"> Register</a>
                            @else

                          <li>{{ Auth::user()->email }}</li>


                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                        </li>
                    </ul>
                </li>
                <li><a class="text-link" href="#about"><span>About</span></a></li>
                <li><a class="text-link" href="#"><span>Contact</span></a></li>

            </ul>
            <!-- Navigation -->

        </div>
    </div>
    <!-- /Main Header -->

</header>