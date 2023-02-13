<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>AoMart | {{ $judul }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('/') }}atlantis/assets/img/icon.ico" type="image/x-icon"/>
	@yield('css')

	<!-- Fonts and icons -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('/') }}atlantis/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('/') }}atlantis/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('/') }}atlantis/assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('/') }}atlantis/assets/css/demo.css">
</head>
<body data-background-color="blue">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="index.html" class="logo">
					<img src="{{ asset('/') }}atlantis/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('logout') }}" role="button">
								<i class="fas fa-sign-out-alt"></i>Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="blue2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('/') }}pictures/default.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{-- @foreach ($user as $item) --}}
											
									{{ $masuk->name }}
									{{-- @endforeach --}}
									<span class="user-level">{{ $masuk->username }}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="{{ url('profile') }}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
            @include('layout.menu')
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
							<h4 class="page-title">Dashboard</h4>
							<ul class="breadcrumbs">
									<li class="nav-home">
											<a href="#">
													<i class="flaticon-home"></i>
											</a>
									</li>
									<li class="separator">
											<i class="flaticon-right-arrow"></i>
									</li>
									<li class="nav-item">
											<a href="#">Pages</a>
									</li>
									<li class="separator">
											<i class="flaticon-right-arrow"></i>
									</li>
									<li class="nav-item">
											<a href="#">Starter Page</a>
									</li>
							</ul>
					</div>
					<div class="page-category">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										@yield('content')
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<footer class="footer">
					<div class="container-fluid">
							<nav class="pull-left">
									<ul class="nav">
											<li class="nav-item">
													<a
															class="nav-link"
															href="https://www.themekita.com"
													>
															ThemeKita
													</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="#"> Help </a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="#"> Licenses </a>
											</li>
									</ul>
							</nav>
							<div class="copyright ml-auto">
									2018, made with
									<i class="fa fa-heart heart text-danger"></i> by
									<a href="https://www.themekita.com">ThemeKita</a>
							</div>
					</div>
			</footer>
		</div>
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('/') }}atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{ asset('/') }}atlantis/assets/js/core/popper.min.js"></script>
	<script src="{{ asset('/') }}atlantis/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('/') }}atlantis/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('/') }}atlantis/assets/js/atlantis.min.js"></script>

	{{-- validator --}}
	<script src="{{ asset('/js/validator.min.js') }}"></script>


	@stack('scripts')

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>