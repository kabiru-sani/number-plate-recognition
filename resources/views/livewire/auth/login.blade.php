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
    <meta property="og:description" content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta property="og:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta property="twitter:type" content="website">
    <meta property="twitter:locale" content="en_NG">
    <meta property="twitter:url" content="{{ \URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Flexi Pay' }}">
    <meta property="twitter:description" content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta property="twitter:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="google:card" content="summary_large_image">
    <meta name="google:url" content="{{ \URL::current() }}">
    <meta name="google:description" content="{{ $description ?? 'Flexi Pay About info' }}">
    <meta name="google:title" content="{{ $title ?? 'Flexi Pay' }}">
    <meta name="google:image" content="{{ $logo ?? asset('assets/img/Meta-logo.png') }}">

    <meta name="description" content="{{ $description ?? 'Flexi Pay.' }}" />
    <meta name="author" content="Flexi Pay" />
    <meta name="url" content="{{ \URL::current() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="Strategic Consulting, Technology, Advisory, Sales, Growth , Mentorship, Acquisition, Regulatory Compliance, Daimun, Training " />

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Font: Maven Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="text-center mb-4">
                <h4 class="fw-bold">{{ __('Authorized Access') }}</h4>
            </div>

            <!-- Session Status -->
            @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
            @endif

            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email address') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                        autofocus autocomplete="email" placeholder="email@example.com">
                </div>

                <!-- Password -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        autocomplete="current-password" placeholder="••••••••">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="small position-absolute end-0 top-100 mt-1 text-decoration-none">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            @if (Route::has('register'))
            <div class="text-center text-muted small">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="text-decoration-none fw-medium">
                    {{ __('Sign up') }}
                </a>
            </div>
            @endif
        </div>
    </div>
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