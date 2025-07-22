<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-wallet me-2"></i>Flexi<span class="fs-5">Pay</span></h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link @yield('welcome')">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link @yield('about')">About</a>
                <a href="{{ route('services') }}" class="nav-item nav-link @yield('services')">Service</a>
                {{--  <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                <a href="{{ route('contact') }}" class="nav-item nav-link @yield('contact')">Contact</a>
            </div>
            <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fa fa-search"></i></butaton>
            <a href="{{ route('login') }}"
                class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Sign in</a>
        </div>
    </nav>
</div>