<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Unical | Hostel Accommodation</title>

	<!-- Site favicon -->
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/custom/favicon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/custom/favicon.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/custom/favicon.png') }}">
	{{-- <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png"> --}}

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="{{ asset('vendors/images/custom/logo.png') }}" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul class="">
					<li><a class="btn btn-outline-dark" href="{{ route('login') }}">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">


        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-12">
                    <div class="display-content-center container">

                        <img src="{{ asset('vendors/images/custom/hostel.png') }}" class="bg-image" width="470">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="main-banner-content container">

                        <h2 class="h3 py-3 wow fadeInLeft" data-wow-delay="00ms" data-wow-duration="1000ms" style="font-family: 'Bahnschrift'; ">Unical Hostel Accommodation</h2>
                        <p class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms" style="font-family:'Bahnschrift';">You are few steps away from getting a suitable space in Unical hostel. Get registered, login and make payment for your space of choice.</p>
                        <div class="banner-btn">
										<a class="btn btn-primary" href="{{ route('verify.student') }}">Apply now</a>

                           {{-- <a href="" class="default-btn wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInRight;">Apply Now<i class="ri-arrow-right-line"></i><span style="top: 16px; left: 117.5px;"></span></a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>

