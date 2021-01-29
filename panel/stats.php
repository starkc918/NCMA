<!doctype html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("php_includes/base.inc.php");
if(!hasPerm("pdcmd")){
	redirect("/index.php");
	die();
}

if(isset($_POST['emg'])) {
	$t['level'] = $_POST['threat'];
	setInfo("threat", json_encode($t));
	unset($_POST['threat']);
	setInfo("freqs", json_encode($_POST));
}

$info = getInfo("freqs");
$info = json_decode($info['data'], true);
$tinfo = getInfo("threat");
$tinfo = json_decode($tinfo['data'], true);
$stmt = $pdo->prepare("SELECT * FROM `arrests` WHERE `RealDate` > NOW() - INTERVAL 24 HOUR ORDER BY `id` DESC");
$stmt->execute();
$arrests = $stmt->fetchAll();
$acnt = count($arrests);
$stmt->closeCursor();
$stmt = $pdo->prepare("SELECT * FROM `traffic`");
$stmt->execute();
$infs = $stmt->fetchAll();
$infracs = count($infs);

$stmtsTotal = $pdo->prepare("SELECT `id` FROM `arrests`");
$stmtsTotal->execute();
$arrestsTotal = $stmtsTotal->fetchAll();
$acntTotal = count($arrestsTotal);

$stmtspendTotal = $pdo->prepare("SELECT `id` FROM `requests`");
$stmtspendTotal->execute();
$pendingplace = $stmtspendTotal->fetchAll();
$pndplcTotal = count($pendingplace);

$cnt = count(copsByDept(PENDING))-1;

?>

<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - Command Dashboard</title>
        <script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/Chart.js"></script>
		<meta name="description" content="Erie County Sheriff Office - Command Dashboard">
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
								<h1>Command Dashboard</h1>
							</header>

						</div>
					</div>

					<!-- Main content -->
					<div class="row">
						<div class="col-12">

							<!-- Inner -->
							<article class="inner">
								<div class="row">
                               		<form action="dashboard.php" method="post">
                                    <div class="form-group col-6" style="border:double">
                                	<div class="form-group col-4">
                                    	<h3>Police Freqs</h3>
                                    	<label for="fr1">Frequency 1:</label>
											<input type="text" name="tac1" value="<?php echo $info['tac1']; ?>" class="form-control" id="fr1" style="width:75%">
										<label for="fr2">Frequency 2:</label>
											<input type="text" name="tac2" value="<?php echo $info['tac2']; ?>" class="form-control" id="fr2" style="width:75%">
                                        <label for="doc">DOC Frequency:</label>
											<input type="text" name="doc1" value="<?php echo $info['doc1']; ?>" class="form-control" id="doc" style="width:75%">
                                        <label for="fr3">Emergency:</label>
											<input type="text" style="width:75%" id="fr3" class="form-control" value="<?php echo $info['emg']; ?>" name="emg">
                                        <div class="styled-select">
                                        <label>Active Frequency:</label>
                                        <select style="width: 200px" name="active">
												<option value="tac1" <?php if($info['active'] == "tac1") echo "selected"; ?>>Tac 1</option>
												<option value="tac2" <?php if($info['active'] == "tac2") echo "selected"; ?>>Tac 2</option>
												<option value="emg" <?php if($info['active'] == "emg") echo "selected"; ?>>Emergency Backup</option>
										</select>
										<br/><br/>
										<label>Active Threat Level:</label>
                                        <select style="width: 200px" name="threat">
												<option value="1" <?php if($tinfo['level'] == "1") echo "selected"; ?>>Green</option>
												<option value="2" <?php if($tinfo['level'] == "2") echo "selected"; ?>>Amber</option>
												<option value="3" <?php if($tinfo['level'] == "3") echo "selected"; ?>>Red</option>
												<option value="4" <?php if($tinfo['level'] == "4") echo "selected"; ?>>Deep Red</option>
												<option value="5" <?php if($tinfo['level'] == "5") echo "selected"; ?>>Martial Law</option>
										</select>
                                        </div>
                                     </div>
                                     <div class="form-group col-4">
                                     	<h3>EMS Freqs</h3>
                                     		<label for="emsps">EMS-PD Joint:</label>
												<input type="text" name="ems" value="<?php echo $info['ems']; ?>" class="form-control" id="emspd" style="width:75%">
                                     		<label for="ems">CH-3:</label>
												<input type="text" name="ch3" value="<?php echo $info['ch3']; ?>" class="form-control" id="ems" style="width:75%">
                                            <br/>
                                         	<button type="submit" class="btn btn-color"><i class="glyphicon glyphicon-send"></i>Submit Frequencies</button>
                                    </div>
									<div class="form-group col-4">
                                     	<h3>Freq Generator</h3>
                                        	<label for="randFreq">Frequency Generater:</label>
												<input type="text" style="width:60%" id="randfreq" class="form-control" onclick="this.focus(); this.select();">
                                                <br>
                                         	<button class="btn btn-color" type="button" onclick="var freq = Math.random() * 10000 % 52 +34; freq = freq.toString().substring(0,4); document.getElementById('randfreq').value = freq; document.getElementById('randfreq').focus(); document.getElementById('randfreq').select();"><i class="glyphicon glyphicon-send"></i>Generate</button>
                                    </div>
                                    </form>
                                    </div>
                                    <div class="form-group col-6" style="border:double">
                                    <div class="form-group col-6">
                                    	<h3>Database Overview</h3>
                                        <font size="+1">
                                        	<label>Officers requesting Transfer/Placement: <strong><?php echo $pndplcTotal; ?></strong></label>
                                            <br>
                                            <label>Total Arrests in Last 24h: <strong><?php echo $acnt; ?></strong></label>
                                            <br>
                                            <label>Total Arrests: <strong><?php echo $acntTotal; ?></strong></label>
                                            <br>
                                            <label>Total Traffic Infractions: <strong> <?php echo $infracs; ?> </strong></label>
                                         </font>
                                    </div>
                                    </div>
                                    <div class="form-group col-12" style="border:double">
                                    	<div class="form-group col-4">
                                        <center><h4>Testing</h4>
                                        	<canvas id="crimeType" ></canvas>
										    <script>
											Chart.defaults.global.responsive = true;
										    Chart.defaults.global.customTooltips = function(tooltip) {

										    	// Tooltip Element
										        var tooltipEl = $('#chartjs-tooltip');

										        // Hide if no tooltip
										        if (!tooltip) {
										            tooltipEl.css({
										                opacity: 0
										            });
										            return;
										        }

										        // Set caret Position
										        tooltipEl.removeClass('above below');
										        tooltipEl.addClass(tooltip.yAlign);

										        // Set Text
										        tooltipEl.html(tooltip.text);

										        // Find Y Location on page
										        var top;
										        if (tooltip.yAlign == 'above') {
										            top = tooltip.y - tooltip.caretHeight - tooltip.caretPadding;
										        } else {
										            top = tooltip.y + tooltip.caretHeight + tooltip.caretPadding;
										        }

										        // Display, position, and set styles for font
										        tooltipEl.css({
										            opacity: 1,
										            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
										            top: tooltip.chart.canvas.offsetTop + top + 'px',
										            fontFamily: tooltip.fontFamily,
										            fontSize: tooltip.fontSize,
										            fontStyle: tooltip.fontStyle,
										        });
										    };

										    var pieData0 = [{
										        value: <?php echo $acntTotal; ?>,
										        color: "#F7464A",
										        highlight: "#FF5A5E",
										        label: "Arrests"
										    }, {
										        value: <?php echo $infracs; ?>,
										        color: "#46BFBD",
										        highlight: "#5AD3D1",
										        label: "Traffic Citations"
										    }];
											
											var pieData1 = [{
										        value: <?php echo $acntTotal; ?>,
										        color: "#F7464A",
										        highlight: "#FF5A5E",
										        label: "Arrests"
										    }, {
										        value: <?php echo $infracs; ?>,
										        color: "#46BFBD",
										        highlight: "#5AD3D1",
										        label: "Traffic Citations"
										    }];
											
											var pieData2 = [{
										        value: <?php echo $acntTotal; ?>,
										        color: "#F7464A",
										        highlight: "#FF5A5E",
										        label: "Arrests"
										    }, {
										        value: <?php echo $infracs; ?>,
										        color: "#46BFBD",
										        highlight: "#5AD3D1",
										        label: "Traffic Citations"
										    }];

										    window.onload = function() {
										        var ctx1 = document.getElementById("crimeType").getContext("2d");
										        	window.myPie = new Chart(ctx1).Pie(pieData0);
												var ctx2 = document.getElementById("chart2").getContext("2d");
       												window.myPie = new Chart(ctx2).Pie(pieData1);
												var ctx3 = document.getElementById("chart3").getContext("2d");
       												window.myPie = new Chart(ctx3).Pie(pieData2);
										    };
											
										    </script>
                                            </center>
                                        </div>
                                        <div class="form-group col-4">
                                        <center><h4>Testing Again</h4>
                                        	<canvas id="chart2" ></canvas>
                                        </center>
                                        </div>
                                        <div class="form-group col-4">
                                        <center><h4>Testing More</h4>
                                        	<canvas id="chart3" ></canvas>
                                        </center>
                                        </div>
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