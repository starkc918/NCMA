<?php
require_once("php_includes/base.inc.php");
if(isLoggedIn() || checkRem()) {
	redirect("index.php");
	die();
}
if(isset($_POST['uname'])) {
	(isset($_POST['rememberme'])) ? $rmme = true : $rmme = false;
	$log = login($_POST['uname'], $_POST['pass'], $rmme);
	switch($log) {
		case 0:
		redirect("index.php");
		die();
		break;
		default:
//		echo "Invalid Username/Password";
		break;
	}
}
?><!DOCTYPE HTML>
<html>
<head>
<title>NCMA - Secure Login</title>
<!-- CSS -->
<link href="css/styleLogin.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Google Fonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
</head>
<body>
<div class="login">
	<div class="login-top">
		<h1>NCMA Login Panel</h1>
		<form method="post" action="login.php">
			<input type="text" name="uname" placeholder="Username" required>
			<input type="password" name="pass" placeholder="Password" required>
            <div id="remdiv">
              <input type="checkbox" name="rememberme" id="rem" checked>
              <label for="rem">Remember Me </label>
            </div>
			<div class="forgot">
				<input type="submit" value="Login" >
			</div>
	    </form>
	</div>
	<div class="login-bottom">
		<h3><a href="register.php">REGISTER</a></h3>
	</div>
</div>	
<div class="copyright">
	<p>© Copyright 2021 National Constables & Marshals Association</p>
</div>
</body>
</html>