<!--Header top area-->
<header class="main-header header-style-one">
    <section class="header-top">
        <div class="container">
            <div class="header">
                <div class="header-top-left">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="header-top-right">
                    <ul>
                        <li>
                            <a href="mailto:heartfund@gmail.com"><span><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i></span>
                                heartfund@gmail.com</a>
                        </li>
                        <li>
                            <p><a href="tel:9855000000"><span><i class="fa fa-phone" aria-hidden="true"></i></span>+977
                                    9855000000</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/header_top_area-->

    <section class="mainmenu-area">
        <div class="container">
            <div class="logo pull-left">
                <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="logo.png"></a>
            </div>
            <nav class="main-menu pull-left">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="clearfix navbar-collapse collapse">
                    <ul class="clearfix navigation">
                        <li><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('donators') }}">Donators</a>
                        </li>
                        <li><a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li><a href="{{ route('causes') }}">Causes</a>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="clearfix mobile-menu">

                        <li><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('donators') }}">Donators</a>
                        </li>
                        <li><a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li><a href="{{ route('causes') }}">Causes</a>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <div class="signup">
                <ul>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" style="margin-right: 15px; font-size: 14px;">
                                <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                            </a>
                        </li>
                        <!-- Show Logout Button if Authenticated -->
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit"
                                    style="background: none; border: none; color: inherit; cursor: pointer; padding: 0; font: inherit;">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Show Login/Signup Buttons if Not Authenticated -->
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> Signup
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </section>
    <!--Main-Mane-->
    <section class="bounce-in-header">
        <div class="container">
            <div class="logo pull-left">
                <a href="index-2.html"><img src="images/logo.png" alt=""></a>
            </div>
            <nav class="main-menu pull-left">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="clearfix navbar-collapse collapse">
                    <ul class="clearfix navigation">
                        <li><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('donators') }}">Donators</a>
                        </li>
                        <li><a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li><a href="{{ route('causes') }}">Causes</a>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="clearfix mobile-menu">

                        <li><a href="{{ route('index') }}">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('donators') }}">Donators</a>
                        </li>
                        <li><a href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li><a href="{{ route('causes') }}">Causes</a>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <div class="signup">
                <ul>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" style="margin-right: 15px; font-size: 14px;">
                                <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                            </a>
                        </li>
                        <!-- Show Logout Button if Authenticated -->
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit"
                                    style="background: none; border: none; color: inherit; cursor: pointer; padding: 0; font: inherit;">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> LOG OUT
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Show Login/Signup Buttons if Not Authenticated -->
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> Signup
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>

        </div>
    </section>
    <!--/Main-Menu-->
</header>
