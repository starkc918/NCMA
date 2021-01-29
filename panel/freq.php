<!doctype html>
<?php
require_once("php_includes/base.inc.php");
if(!hasPerm("officer") || empty($luser['id'])) {
	redirect("/index.php");
	die();
}
$info = getInfo("freqs");
$info = json_decode($info['data'], true);
$tinfo = getInfo("threat");
$tinfo = json_decode($tinfo['data'], true);
$lf = getInfo("lastfreq");
$lf = json_decode($lf['data'], true);
$lf[$luser['id']] = time();
$now = time();
foreach($lf as $k => $v)
	if($now - $v > HOUR*4) unset($lf[$k]);
setInfo("lastfreq", json_encode($lf));
$info[$info['active']] = "<span style=\"color: red; font-weight: bold;\">".$info[$info['active']]." - ACTIVE</span>";

$ip = $_SERVER["REMOTE_ADDR"];
$file = fopen("log.txt","a");
fwrite($file, "Name: ".$luser['uname']."\nIP: ".$ip."\nDate: ".date("D dS M, Y h:i a")."\n\n");
fclose($file);
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - Frequencies</title>
		<meta name="description" content="Erie County Sheriff Office - Frequencies">
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
								<h1>Frequencies</h1>
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
										<h4>Threat Level:
										<?php
										$t = intval($tinfo['level']);
										$col = "#00aa00";
										switch($t) {
											case 1:
											$col = "<span style=\"color: #00aa00; font-weight: bold\">GREEN</span>";
											break;
											case 2:
											$col = "<span style=\"color: #ffaa00; font-weight: bold\">AMBER</span>";
											break;
											case 3:
											$col = "<span style=\"color: red; font-weight: bold\">RED</span>";
											break;
											case 4:
											$col = "<span style=\"color: maroon; font-weight: bold\">DEEP RED</span>";
											break;
											case 5:
											$col = "<span style=\"color: black; font-weight: bold\" id=\"mlaw\">MARTIAL LAW</span><script type=\"text/javascript\">var m = document.getElementById('mlaw'); setInterval('if(m.style.opacity == 0.0) m.style.opacity = 1.0; else m.style.opacity = 0.0;', 250);</script>";
											break;
											default:
											$col = "<span style=\"color: white; font-weight: bold\">UNKNOWN</span>";
										}
										echo $col;
										?>
										</h4>
                                        <h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">PD Frequency 1: <?php echo $info['tac1']; ?></h4>
                                        <h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">PD Frequency 2: <?php echo $info['tac2']; ?></h4>
                                        <h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">DOC Frequency: <?php echo $info['doc1']; ?></h4>
										<h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">Emergency Backup Frequency: <?php echo $info['emg']; ?></h4>
                                        <br/>
                                        <h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">PD-EMS Joint Frequency: <?php echo $info['ems']; ?></h4>
                                        <h4 style="-webkit-touch-callout: none; -webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">Ch-3: <?php echo $info['ch3']; ?></h4>
										<span><b>Last Accesses:</b><br/><?php
										arsort($lf, SORT_NUMERIC);
										foreach($lf as $k => $v) {
											if(empty($k)) continue;
											$u = getUser($k, U_ID);
											echo $u['display'].' ( '.round(($now-$v)/60).' minutes ago )<br/>';
										}
										?></span>
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
		<script type="text/javascript" src="js/ticker.js"></script>

	</body>
</html>
