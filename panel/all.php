<!doctype html>
<?php
require_once("php_includes/base.inc.php");
if(!hasPerm("officer")){
	redirect("/index.php");
	die();
}
$stmt = $pdo->prepare("SELECT * FROM `arrests` WHERE `RealDate` > NOW() - INTERVAL 100 DAY ORDER BY `id` DESC");
$stmt->execute();
$arrests = $stmt->fetchAll();
$acnt = count($arrests);
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - Recent Arrests</title>
		<meta name="description" content="Erie County Sheriff Office - Recent Arrests">
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
		
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

			<!-- Content -->
			<div id="content">

				<!-- Fluid container -->
				<div class="container-fluid">
					
					<!-- Page heading -->
					<div id="heading" class="row">
						<div class="col-12">

							<header>
								<h1>All Arrests - Dev Use Only</h1>
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
									<h4>Retrieved <?php echo $acnt; ?> Arrests</h4>
									</div>
								</div>
                                <center>
							  	<table style="text-align: center">
								  <tbody>
									<tr>
										<th>Time of Arrest</th>
										<th>Name</th>
										<th>Crime</th>
										<th>Time</th>
										<th>Bail</th>
										<th>Bond</th>
										<th>Arresting Officer</th>
									</tr>
									<?php
									for($i = 0; $i < $acnt; $i++) {
										$aoffi = getUser($arrests[$i]['copid'], U_ID);
										($arrests[$i]['bondid'] == -1) ? $bond = "No" : $bond = "Yes";
										if($arrests[$i]['bail'] == 0) $bail = "No"; else $bail = "$".number_format($arrests[$i]['bail']);
										echo "<tr><td>".antiXSS($arrests[$i]['RealDate'])."</td><td>".antiXSS(getCiv($arrests[$i]['uid'], U_ID)['name'])."</td><td>".titleFormat(antiXSS($arrests[$i]['crimes']))."</td><td>".antiXSS(number_format($arrests[$i]['time']))."</td><td>$bail</td><td>$bond</td><td>$aoffi[display]</td></tr>";
									}
									?>
								  </tbody>
								  </table>
								</center>
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
    </script>
	</body>
</html>