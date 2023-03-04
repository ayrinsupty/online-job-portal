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
                        <li class="nav-item">
                            <a href="about.html" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Jobs <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="job-list.html" class="nav-link">Job List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="favourite-job.html" class="nav-link">Favourite Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="job-details.html" class="nav-link">Job Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="post-a-job.html" class="nav-link">Post A Job</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Candidates <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="candidate-list.html" class="nav-link">Candidate List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="candidate-details.html" class="nav-link">Candidate Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="single-resume.html" class="nav-link">Single Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a href="submit-resume.html" class="nav-link">Submit Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard.html" class="nav-link">Candidate dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Pages <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="company-list.html" class="nav-link">Company List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="company-details.html" class="nav-link">Company Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="login.html" class="nav-link">Login Page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="create-account.html" class="nav-link">Create Account Page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="profile.html" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="single-profile.html" class="nav-link">Single Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="404.html" class="nav-link">404</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-and-conditions.html" class="nav-link">Terms and Conditions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Blogs <i
                                    class="icofont-simple-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-details.html" class="nav-link">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle">{{ Auth::user()->full_name }} <i
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
