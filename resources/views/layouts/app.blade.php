<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title> Admin Dashboard</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/style.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/plugins/jquery-steps/jquery.steps.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	@livewireScripts
	@stack('styles')
</head>
<body>
    <style>
        #simple-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: #ffffff;
        }
    </style>
    <div id="simple-loader" class="d-flex flex-column justify-content-center align-items-center vh-100 bg-white">
        <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;">
        </div>
    </div>

	@include('livewire.admin.includes.header')

	@include('livewire.admin.includes.navbar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
            
			{{ $slot }}

			<div class="footer-wrap pd-20 mb-20 card-box mt-5">
                <script>document.write(new Date().getFullYear())</script> ©  Flexi Pay.
			</div>
		</div>
	</div>
	<!-- js -->
	@livewireScripts
	@stack('scripts')
	<script src="{{ asset('admin/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/dashboard.js') }}"></script>

	<script src="{{ asset('admin/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
	<script src="{{ asset('admin/vendors/scripts/steps-setting.js') }}"></script>

	<!-- buttons for Export datatable -->
	<script src="{{ asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

	{{-- <script src="{{ asset('admin/vendors/scripts/datatable-setting.js') }}"></script> --}}

    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('simple-loader');
            if (loader) {
                loader.style.transition = 'opacity 0.5s ease';
                loader.style.opacity = 0;
                setTimeout(() => loader.remove(), 500);
            }
        });
    </script>

</body>
</html>