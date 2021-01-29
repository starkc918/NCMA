<?php
require_once("php_includes/base.inc.php");
logout();
redirect("index.php");
?>
<!doctype html>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>Logout</title>
		<meta name="description" content="Erie County Police Department - 404">
		<meta name="author" content="Cole Kief (Green Haze), Scott Harm">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicons -->
		<link rel="shortcut icon" href="img/favicons/favicon.png">
		<link rel="apple-touch-icon" href="img/favicons/icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicons/72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicons/114x114.png">
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300|Muli:300" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/idangerous.swiper.css">
		<link rel="stylesheet" href="css/style.css">

	</head>

	<body>

		<!-- Preloader -->
		<div id="preloader">
			<div id="status"></div>
		</div>

		<!-- Overlay -->
		<div id="overlay"></div>

		<!-- Top header -->
		<div id="top">

			<!-- Sidebar button -->
			<a href="#" id="sidebar-button"></a>
			
			<!-- Logo -->
			<header id="logo">
				<img src="img/logo.png" alt="Logo">
			</header>

		</div>
		
		<!-- Main wrapper -->
		<div id="main-wrapper">

			<!-- Content -->
			<div id="content">

				<!-- Fluid container -->
				<div class="container-fluid">
					
					<!-- Page heading -->
					<div id="heading" class="row">
						<div class="col-12">

							<header>
								<h1>You have been logged out.</h1>
							</header>

						</div>
					</div>

					<!-- Main content -->
					<div class="row">
						<div class="main-column col-12">

							<!-- Inner -->
							<div class="inner">

								<div class="row">
									<div class="col-6">
										<p>You are being redirected back to the login page...</p>
								</div>

							</div>

						</div>
					</div>

				</div>

			</div>

			<!-- Collapsible sidebar -->
			<div id="sidebar">

				<!-- Widget Area -->
				<div id="widgets">
				
					<!-- Main menu -->
					<nav id="mainmenu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="crime.php">Criminal Database</a></li>
                            <li><a href="traffic.php">Traffic Infractions</a></li>
							<li><a href="warrants.html">Warrants</a></li>
                            <li><a href="calc.php">Time Calculator</a></li>
                            <li><a href="info.html">Useful Information</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</nav>

				</div>

				<!-- Copyright -->
				<footer>
					<p class="copyright">© Copyright 2015 Life-Studios</p>
				</footer>

			</div>

		</div>

		<!-- JavaScripts -->
		<script type='text/javascript' src='js/jquery.min.js'></script>
		<script type='text/javascript' src='js/bootstrap.min.js'></script>
		<script type='text/javascript' src='js/swiper/idangerous.swiper.min.js'></script>
		<script type='text/javascript' src='js/masonry/masonry.pkgd.min.js'></script>
		<script type='text/javascript' src='js/isotope/jquery.isotope.min.js'></script>
		<script type='text/javascript' src='js/custom.js'></script>

	</body>
</html>