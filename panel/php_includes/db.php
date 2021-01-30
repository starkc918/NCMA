<?php
define("WWWHOST", "panel.cstark.me");
if($_SERVER["HTTP_HOST"] != WWWHOST) {
	redirect("http://".WWWHOST."/".str_replace("/panel/", "", $_SERVER["REQUEST_URI"]));
	die();
}
//error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
define('HOST', "localhost");
define('USER', "cstark_ncmausr");
define('PASS', "CedYpU5JN2k6");
define('DB', "cstark_ncmapanel");
define('BASEDIR', "/home/cstark/public_html");

function genPDO($DB = DB, $user = USER, $pass = PASS, $host = HOST) {
	$pdo = new PDO("mysql:host=".$host.";dbname=".$DB, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
}

$pdo = genPDO();
?>
