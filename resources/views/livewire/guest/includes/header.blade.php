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
                {{-- <a href="{{ route('about') }}" class="nav-item nav-link @yield('about')">About</a>
                <a href="{{ route('services') }}" class="nav-item nav-link @yield('services')">Service</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link @yield('contact')">Contact</a> --}}
            </div>
            <a href="{{ route('login') }}"
                class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Sign in</a>
        </div>
    </nav>
</div>