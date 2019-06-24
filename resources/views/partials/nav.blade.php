<div id="navspacer" class="navspacer"></div>

<!-- Mobile -->
    <div class="navmobile">
        <button type="button" id="navmobilebtn" class="btn btn-primary float-right">Menu</button>
    </div>
<!-- End Mobile -->

<div id="navbar" class="navbar">

        <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                <div class="logo-box">
                    <a id="logolink" href="/"><img id="logo" class="logo" src="{{ url('/images/Reminder(trans).png') }}"/></a>
                </div>
            </div>
            <div class="col-12 col-sm-9 col-md-9 col-lg-9">

                    <ul class="navbar-login">
                            <!-- Authentication Links -->
                            @guest
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
        
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                    </ul>
                    <ul class="nav text-right float-right">
                            <li><a id="home" class="btn btn-primary" href="/">Home</a></li>
                            <li><a id="portfolio" class="btn btn-primary" href="/portfolio">Portfolio</a></li>
                            <li><a id="about" class="btn btn-primary" href="/about">About</a></li>
                            <li><a id="contact" class="btn btn-primary" href="/contact">Contact</a></li>
                    </ul>
            </div>
        </div>
</div>