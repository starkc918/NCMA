<?php
require('base.inc.php');
if($_SERVER["HTTP_CF_CONNECTING_IP"] == "2602:30a:2e6b:8340:38bf:a054:e462:aba6" || $_SERVER['HTTP_CF_CONNECTING_IP'] == '162.230.186.28' || $_SERVER['HTTP_CF_CONNECTING_IP'] == "158.69.210.7") { redirect("/index.php"); die(); }
$fs = popen("mysqldump --user=".USER." --password=".PASS." ".DB,"r");
while(!feof($fs))
	echo fread($fs, 2048);
?>
