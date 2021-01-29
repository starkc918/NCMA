<!doctype html>
<?php
require_once("php_includes/base.inc.php");
if(!hasPerm("da")){
	redirect("index.php");
	die();
}
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - Add Warrant</title>
		<meta name="description" content="Erie County Sheriff Office - Add Warrant">
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
                        <div class="alert alert-danger fade in">
							<i class="fa fa-exclamation-circle"></i>
							<p>DOES NOT WORK</p>
						</div>

							<header>
								<h1>Add Warrant</h1>
                                <h2>DOES NOT WORK (VINCI)</h2>
							</header>

						</div>
					</div>

					<!-- Main content -->
					<div class="row">
						<div class="col-12">
							<!-- Inner -->
							<article class="inner">
								<div class="row">
									<form action="addWarrant.php" method="post">
									<div class="form-group col-5" style="border:double">
                                	<div class="form-group col-12">
                                    	<h3>Add Warrant</h3>
                                    	<label for="suspect">Suspect Name: <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="sus" value="" class="form-control" id="suspect" style="width:50%" required>
                                            
                                        <label for="ofcName">Officer Name: <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="ofc" value="" class="form-control" id="ofcName" style="width:50%" required>
                                        <label for="appJud">Approving Judge Name: <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="ofc" value="" class="form-control" id="appJud" style="width:50%" required>
                                        <label for="crime">Crime(s) <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="crime" placeholder="Seperate each crime with a ," class="form-control" id="crime" style="width:80%" required>
										<label for="wType">Warrant Type: <span class="form-required" title="This field is required.">*</span></label>
                                        	<select style="width: 25%" name="wType" class="form-control" required>
													<option value="arrest">Arrest</option>
													<option value="bench">Bench</option>
													<option value="search">Search/Seize</option>
											</select>
                                        <label for="bond">Bond (Yes/No): <span class="form-required" title="This field is required.">*</span></label>
                                        	<select style="width: 25%" name="bond" class="form-control" required>
													<option value="no">No</option>
													<option value="yes">Yes</option>
											</select>
                                        <label for="date">Date of Affidavit: <span class="form-required" title="This field is required.">*</span></label>
											<input type="text" name="date" value="" class="form-control" id="date" style="width:25%" required>
                                        <label for="rPort">Warrant Link: <span class="form-required" title="This field is required.">*</span></label>
                                        	<input type="text" name="rPort" class="form-control" id="rPort" style="width:100%" required></input>
                                     <br>
                                     <button type="submit" class="btn btn-color"><i class="glyphicon glyphicon-send"></i>Add Warrant</button>
                                     </div>
                                    </form>
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

	</body>
</html>