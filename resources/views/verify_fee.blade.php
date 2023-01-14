<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Unical | Hostel Accommodation</title>

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
	<div class="login-wrap  align-items-center ustify-content-center">


        <div class="container">
            <div class="row justify-content-center">
                {{-- <div class="alert alert-danger">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div> --}}

                @if(Session::has('error_message'))
                <div class="alert alert-danger   fade show" role="alert">

                    {{Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                @endif


                <div class="col-md-9 col-lg-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h4 class="text-center text-dark" style="font-size:20px">Verify you are a student</h4>
						</div>
						<form action="{{ route('fee.status') }}" method="POST">
                            @csrf
                            @include('inc.frontMessage')
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg @error('payment_code') is-invalid @enderror" placeholder="School Fees Pin" name="payment_code">
                                @error('payment_code')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
								<div class="input-group-append custom">
									<span class="input-group-text">
                                        <span class="icon-copy ti-key"></span>
                                    </span>
								</div>
							</div>
							<div class="form-group">
                                <select class="form-control @error('session') is-invalid @enderror" name="session">
                                    <option selected='' disabled>Select session</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                                @error('session')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>

							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0 py-3">

									<button class="btn btn-primary btn-lg btn-block">Submit</button>
									</div>

								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
	</div>
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/dashboard.js') }}"></script>
</body>
</html>

