<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>{{ $title ?? 'Flexi Pay' }}</title>

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_NG">
    <meta property="og:url" content="{{ \URL::current() }}">
    <meta property="og:title" content="{{ $title ?? 'Flexi Pay' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta property="og:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta property="twitter:type" content="website">
    <meta property="twitter:locale" content="en_NG">
    <meta property="twitter:url" content="{{ \URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Flexi Pay' }}">
    <meta property="twitter:description"
        content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta property="twitter:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="google:card" content="summary_large_image">
    <meta name="google:url" content="{{ \URL::current() }}">
    <meta name="google:description" content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta name="google:title" content="{{ $title ?? 'Flexi Pay' }}">
    <meta name="google:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="description"
        content="{{ $description ?? 'Flexi Pay.' }}" />
    <meta name="author" content="Flexi Pay" />
    <meta name="url" content="{{ \URL::current() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Strategic Consulting, Technology, Advisory, Sales, Growth , Mentorship, Acquisition, Regulatory Compliance, Daimun, Training " />

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Font: Maven Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> --}}

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @stack('styles')
    @livewireStyles()
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        @include('livewire.guest.includes.header')
        <!-- Navbar & Hero End -->

        {{ $slot }}

        <!-- Footer Start -->
        @include('livewire.guest.includes.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @livewireScripts()
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/lazyload.js') }}"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
