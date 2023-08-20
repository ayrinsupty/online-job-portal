<div class="navbar-area navbar-area-two fixed-top">

    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link dropdown-toggle active">
                                Home
                            </a>
                        </li>
                        @auth
                            @role('Seeker')
                            <li class="nav-item">
                                <a href="{{ route('job.application') }}" class="nav-link">My Application (
                                  @php
                                    $count = App\Models\Apply::where('user_id', auth()->id())
                                          ->whereNotIn('status', [App\Models\Apply::$statusArray[2], App\Models\Apply::$statusArray[3]])
                                          ->count();
                                  echo $count;
                                  @endphp )</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link">Panel</a>
                            </li>
                            @endrole
                        @endauth

                    </ul>

                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle">{{ Auth::user()->first_name }}
                                    <i
                                        class="icofont-simple-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                Logout
                                            </x-dropdown-link>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <a class="login-btn" href="{{ route('dashboard') }}">
                                            <i class="icofont-plus-square"></i>
                                            Profile Setting
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <div class="common-btn">
                                <a class="login-btn" href="{{ route('login') }}">
                                    <i class="icofont-plus-square"></i>
                                    Login
                                </a>
                                <a class="sign-up-btn" href="{{ route('register') }}">
                                    <i class="icofont-user-alt-4"></i>
                                    Sign Up
                                </a>
                            </div>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
