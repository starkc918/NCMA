<?php
define("WWWHOST", "police.arma3-life.com");
if($_SERVER["HTTP_HOST"] != WWWHOST) {
	redirect("http://".WWWHOST."/".str_replace("/police/", "", $_SERVER["REQUEST_URI"]));
	die();
}
//error_reporting(E_ALL);
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
define('HOST', "localhost");
define('USER', "arma3l_a3l");
define('PASS', "f2SZVm0pej0MTfCvwZlp");
define('DB', "arma3l_policedb");
define('BASEDIR', "/var/www/arma3l_police");

function genPDO($DB = DB, $user = USER, $pass = PASS, $host = HOST) {
	$pdo = new PDO("mysql:host=".$host.";dbname=".$DB, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
}

$pdo = genPDO();
?>
