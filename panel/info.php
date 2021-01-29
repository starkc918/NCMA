<!doctype html>
<?php
require_once("php_includes/base.inc.php");
if(!isLoggedIn()){
	echo "You are not logged in... redirecting.";
	redirect("/login.php");
	die();
}
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - General Information</title>
		<meta name="description" content="Erie County Sheriff Office - General Information">
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
		<link rel="stylesheet" href="css/ticker.css">

	</head>

	<body>

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
			<?php require_once("boloTicker.php"); ?>

			<!-- Content -->
			<div id="content">

				<!-- Fluid container -->
				<div class="container-fluid">
					
					<!-- Page heading -->
					<div id="heading" class="row">
						<div class="col-12">

							<header>
								<h1>General Information</h1>
							</header>

						</div>
					</div>

					<!-- Main content -->
					<div class="row">
						<div class="col-12">

							<!-- Inner -->
							<article class="inner">

								<div class="row">
									<div class="col-12">
                                        <h5><a href="https://docs.google.com/spreadsheets/d/1PChGNsuNAm0vn7iVhab8cT9AVbTLtwcyjEMO7WTNErA/edit#gid=215789924">Criminal Code</a></h5>
                                        <h5><a href="https://docs.google.com/spreadsheets/d/15kRFBusSzjBxEZq1j_2POPwK59N91EXnvFm3t7c4DqA/edit#gid=902134807">10 Codes / Patrol Loadouts</a></h5>
                                        <h5><a href="https://docs.google.com/document/d/15I2XmIDfnp6LUJgUoO4-Nb5dLN9DinKIwJ0hPmIj2P0/edit">Police Department Handbook</a></h5>
                                        <h5><a href="http://www.arma3-life.com/forums/index.php?/forum/459-air-support-unit/">Air Support Qualification SOP</a></h5>
                                        <h5><a href="https://docs.google.com/spreadsheets/d/1TLI6Y9C7SFjdFeljnUBMHJfjRacgf9I1_XKg9caD5wk/edit#gid=0">Police Department Roster</a></h5>
                                        <h5><a href="https://docs.google.com/spreadsheets/d/1jvYUpDv9owRgibYESXm1ykFliarfQNSGnvIiWv7Igoc/edit#gid=0">DOJ Register (Lawyers/Prosecutors/Paralegals)</a></h5>
                                        <h5>Want something added? Let Scott Harm or Cole Kief know!</h5>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>

			<!-- Collapsible sidebar -->
			<?php require_once("sidebar.php"); ?>

				<!-- Copyright -->
				<footer>
					<p class="copyright">© Copyright 2021 National Constables & Marshals Association</p>
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
		<script type="text/javascript" src="js/ticker.js"></script>

	</body>
</html>