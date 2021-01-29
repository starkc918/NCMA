<!doctype html>
<?php
require_once("php_includes/base.inc.php");
if(!hasPerm("officer")){
	redirect("/index.php");
	die();
}
$stmt = $pdo->prepare("SELECT * FROM `traffic` WHERE `RealDate` > NOW() - INTERVAL 24 HOUR ORDER BY `id` DESC");
$stmt->execute();
$traffic = $stmt->fetchAll();
$acnt = count($traffic);
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
		<link rel="stylesheet" href="css/ticker.css">
		
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
        	<?php require_once("boloTicker.php"); ?>

			<!-- Content -->
			<div id="content">

				<!-- Fluid container -->
				<div class="container-fluid">
					
					<!-- Page heading -->
					<div id="heading" class="row">
						<div class="col-12">

							<header>
								<h1>Recent Traffic Citations - Last 24 Hours</h1>
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
									<h4>Retrieved <?php echo $acnt; ?> Citations</h4>
									</div>
								</div>
                                <center>
							  	<table style="text-align: center">
								  <tbody>
									<tr>
										<th>Time Entered</th>
										<th>Date</th>
										<th>Name</th>
										<th>Offense</th>
										<th>Ticket Price</th>
										<th>Officer</th>
										<th>Additional Information</th>
									</tr>
									<?php
									$acnt = count($traffic);
									for($i = 0; $i < $acnt; $i++) {
										$civ = getCiv($traffic[$i]['civid'], U_ID);
										$traf = $civ['name'];
										$aoffi = getUser($traffic[$i]['copid'], U_ID);
										if($traffic[$i]['ticket'] == 0) $ticket = "N/A (Warning only)"; else $ticket = "$".number_format($traffic[$i]['ticket']);
										if(empty($traffic[$i]['notes'])) $traffic[$i]['notes'] = "N/A";
										echo "<tr><td>".antiXSS($traffic[$i]['realdate'])."</td><td>".antiXSS($traffic[$i]['date'])."</td><td>$traf</td><td>".titleFormat(antiXSS($traffic[$i]['reason']))."</td><td>".antiXSS($ticket)."</td><td>$aoffi[display]</td><td>".$traffic[$i]['notes']."</td></tr>";
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
		<script type="text/javascript" src="js/ticker.js"></script>
    </script>
	</body>
</html>