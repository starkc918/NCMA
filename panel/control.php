<!doctype html>
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("php_includes/base.inc.php");
$isCmd = hasPerm("pdcmd");
if(!$isCmd){
	redirect("/index.php");
	die();
}
if(isset($_GET['page']) && !isset($_POST['officer']) && !isset($_POST['depts'])) redirect("control.php");
if(isset($_POST['officer'])) {
	$off = getUser($_POST['officer'], U_ID);
	$usr = getUser($_SESSION['uname'], U_UNAME);
	if((intval($usr['rank']) > intval($off['rank']) && intval($_POST['rank']) < intval($usr['rank']) && $isCmd) || isSubOf($usr['dept'], $off['dept'])) {
		if(intval($_POST['rank']) != -1) setRank($off['id'], $_POST['rank']);
		else fireMember($off['id']);
	}
}
?>
<html lang="en-US">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<title>ECSO - Officer Manager</title>
		<meta name="description" content="Erie County Sheriff Office - Officer Manager">
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
			
			<div class="alert alert-info fade in">
									<i class="fa fa-info-circle"></i>
									<p>You can only make changes within your own department and up to your rank. EX: If you are a Lt, and you need to promote a Srg. to Lt, you must get a Capt. to do it. Same goes for demoting/firing.</p>
								</div>

				<!-- Fluid container -->
				<div class="container-fluid">
					
					<!-- Page heading -->
					<div id="heading" class="row">
						<div class="col-12">

							<header>
								<h1>Manage Officers</h1>
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
									<h4>Change Current Officers</h4>
									</div>
								</div>
                                <form id="post-control" class="inner" action="control.php?page=edit" method="post">
                                <center>
								<?php if(!isset($_GET['page'])) { ?>
								<button type="button" onclick="window.location='control.php?page=requests'" class="btn btn-color" disabled><i class="glyphicon glyphicon-send"></i>View Requests</button>
								<br/>
								<br/>
								<div class="styled-select">
								Department to Modify:<br/>
											<select name="depts">
                                            		<?php
													$usr = getUser($_SESSION['uname'], U_UNAME);
													$udept = getDept($usr['dept']);
													$di = json_decode($udept['info'], true);
													$dcnt = count($di['reporters']);
													echo "<option value=\"".$udept['id']."\">".$udept['dname']."</option>";
													for($i = 0; $i < $dcnt; ++$i) {
														if(intval($di['reporters'][$i]) == -1) continue;
														$dept = getDept($di['reporters'][$i]);
														echo "<option value=\"".$dept['id']."\">".$dept['dname']."</option>";
													}
													?>
                                        		</select>
                                            </div>
								<button type="submit" class="btn btn-color"><i class="glyphicon glyphicon-send"></i>Edit Officer</button>
								<?php
								} else if($_GET['page'] == "requests") {
									echo "This is not in place, yet.";
									redirect("control.php");
								} else if($_GET['page'] == "edit" && isset($_POST['depts'])) { ?>
								<div class="styled-select">
											Officer:
											<input type="hidden" name="depts" value="<?php echo $_POST['depts']; ?>" />
											<select name="officer">
                                            		<?php
													$usr = getUser($_SESSION['uname'], U_UNAME);
													$udept = getDept($_POST['depts']);
													$members = copsByDept($_POST['depts']);
													$mcnt = count($members);
													$isSub = isSubOf($usr['dept'], $_POST['depts']);
											for($j = 0; $j < $mcnt; ++$j) {
												if(intval($members[$j]['rank']) >= intval($usr['rank']) && !$isSub) continue;
												echo "<option value=\"".$members[$j]['id']."\">".getRankName($members[$j]['id'])." ".$members[$j]['display']."</option>";
											}
													?>
                                        		</select><br/>To Rank:
											<select name="rank">
											<?php
											$ranks = json_decode($udept['ranks']);
											$rcnt = count($ranks);
											for($i = 0; $i < $rcnt; ++$i)
												if($i >= intval($usr['rank']) && !$isSub) continue;
												else
													echo "<option value=\"$i\">".$ranks[$i]."</option>";
											?>
											<option style="color:maroon; font-weight: bold;" value="-1">FIRED</option>
											</select>
                                            </div><br/>
											<button type="submit" class="btn btn-color"><i class="glyphicon glyphicon-send"></i>Confirm Edit</button>
								<?php
								} else redirect("control.php");
								?>
								</center>
                                </form>
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