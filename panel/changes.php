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
		<title>ECSO - Changelog</title>
		<meta name="description" content="Erie County Sheriff Office - Changelog">
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
								<h1>Website Changelog</h1>
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
                                        <div class="content_section">
                                          	<div class="content commongradient">
                                            <h1>Website News &amp; Updates</h1>
											<p>This is an ongoing list of changes and outstanding issues. All credit goes to:
                                            <br><strong>Cole Kief-</strong> Project Lead/Site Design
                                            <br><strong>Scott Harm-</strong> Project Lead/Backend
                                            <br><strong>Colin Fox-</strong> Backend (Retired)
                                            </p>
                                            <br>
											<div class="panel-group" id="accordion">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">Known Issues as of 6/17/2016</a>
														</h4>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse">
														<div class="panel-body">
															<p>
															+ None, please report any bugs!
															</p>
														</div>
													</div>
												</div>
											</div>
											<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">June 19, 2016</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + You can no longer copy the frequencies for security reasons<br>
                                                + More counter measures to be added soon.<br>
                                            	</p>
                                          	</div>
                                            <br>
                                            <div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">June 17, 2016</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + Prior conviction counter, no more counting someones records by hand!<br>
                                                + Developer tools/pages (only devs can see/use)<br>
                                            	</p>
                                          	</div>
                                            <br>
											<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">June 12, 2016</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + Updated links on Useful Links<br>
                                                + Fixed doc_data.php prisoner name<br>
                                                + Removed out-dated wraning messages on multiple pages<br>
                                                + Fixed multiple other issues<br>
                                            	</p>
                                          	</div>
                                            <br>
											<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">December 11, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + Updated links on Useful Links<br>
                                                + Fixed visual bugs with black bar appearing after entering arrest/citation/etc.<br>
                                                + Changed layout of the sidebar<br>
                                                + Everyone can now use DOC Panel, read page thread listed for update.<br>
                                            	</p>
                                          	</div>
                                            <br>
											<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">December 10, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + BOLO Ticker at top of page shows all BOLO's in past hour.<br>
                                                + Fixed a few links and text<br>
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">December 8, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + BOLO System Added
                                            	</p>
                                            	<p><strong>Issues Added:</strong></p>
                                            	<p>
                                            	+ Last page of DOC Dashboard table is messed up
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">December 7, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + Development Resumed<br>
                                                + DOC Database Pages Added<br>
                                                + DOC Department Added<br>
                                                + All department ranks changed for SO use.<br>
                                                + Lakeside changed -> Erie County<br>
                                            	</p>
                                            	<p><strong>Issues Added:</strong></p>
                                            	<p>
                                            	+ Last page of DOC Dashboard table is messed up
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">September 19, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + Sub-department system in-place<br>
											    + Laid framework for new system of verification which will double as departmental transfer via "user requests"<br>
											    + Command can now edit the ranks of those lower than them(not equal or higher) or have complete control over their sub-departments regardless of rank.<br>
											    + Command can also use the above to fire LEOs<br>
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">September 18, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + If a crime is left without words being capitalized, on display they are capitalized automatically using proper title rules. (Also known as Anti-OCD)<br>
											    + It is no longer possible to double-charge someone by refreshing the charge entering page.<br>
											    + Command members can now view all arrests made in the last 24 hours.<br>
											    + When searching criminals, entering any part of the name will now autocomplete, not just the first part.<br>
											    + Frequency page now viewable by any confirmed LEO(Not bounty hunters), working.<br>
											    + Command can now edit the frequencies displayed on the frequency page, and set which one is "active". Active frequency displayed in red and bolded with the word " - ACTIVE".<br>
											    + Snuck in a "Password Confirmation" box on the registration page.<br>
											    + Home and Sidebar no longer appear in the sidebar when logged out, instead a Login link appears.<br>
											    + Login page now properly redirects to the index if you are logged in.<br>
											    + Laid framework for expanded permissions allowing departments to "report to" other departments, essentially allowing them to be the super command over those departments.<br>
											    + Laid framework for dynamic rank-based command, giving them powers over their respective department at specified rank.<br>
											    + Autocomplete put to a timer instead of when the search box is changed. There is a notable slowdown, but this is intentional to reduce just a little bit of unnecessary load on the server and use less requests at once. The max wait for the auto-complete to complete is around 2 seconds plus ping.<br>
                                            	</p>
                                            	<p><strong>Removed:</strong></p>
                                            	<p>
                                            	- Time Calculator
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">September 17, 2015</a></h2>
                                            	<p><strong>Added:</strong></p>
                                            	<p>
                                                + The bail area when entering a crime will now accept inputs like $100,000 if you so desire to enter it, as it will now convert that to 100000 accordingly. However it only works with '$', ',', and '.' at this time, so don't throw in random stuff and expect it to still work.<br>
                                                + As a criminal's name is entered when searching, it will now auto-complete from the database as you type.<br>
												+ When adding a new crime, no value except for bail can be left blank. Blank crimes are not accepted.<br>
												+ Added a welcome message on the homepage for aesthetics, it will now welcome you with "Welcome, (Rank) (Last name)". However at this time almost everyone is down as an Officer in Patrol as soon as they're verified, but this should be fixed up within the next 24 hours when I come out with a page to allow for actual dept/rank editing by Command and not just me editing people in the DB.<br>
    											+ A roster that can be seen here, this is not currently linked anywhere on the site as I don't want to clutter the sidebar too much at this point. A new page for small things like this will be added in the near future.<br>
    											+ Badge numbers, if set, will show on the roster page.<br>
    											+ Basic verification page so this can go live, Command, DA, DOJ, and Site Admins(Scott Harm, Cole Kief) can approve accounts at this point in time.<br>
                                            	</p>
                                          	</div>
                                            <br>
                                          	<div class="update" style="border-bottom: 1px dotted black; margin-bottom: 10px; padding-bottom: 5px;">
                                              	<a href="" style="font-size: 16px; font-weight: bold; margin: 10px 0; padding: 5px; display: block; color: white; border-bottom: 2px solid #333;">September 16, 2015</a></h2>
                                            	<p>
                                                + New Database Launched!
                                                </p>
          									</div>
          									</div>
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