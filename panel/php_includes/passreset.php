<?php
require_once('base.inc.php');
if($_SERVER["REMOTE_ADDR"] != "2602:30a:2e6b:8340:38bf:a054:e462:aba6" && $_SERVER['REMOTE_ADDR'] != '162.230.186.28' && $_SERVER['REMOTE_ADDR'] != "158.69.210.7" && $_SERVER['REMOTE_ADDR'] != "8.26.94.10") { redirect("/index.php"); die(); }
if(!empty($_POST['uname'])) {
	$np = genSalt(15);
	$usr = getUser($_POST['uname'], U_DNAME);
	if($usr)
		if(setUData($np, U_PASS, $usr['id']))
			echo "$usr[display]'s password successfully changed to $np<br/><br/>";
		else echo "Password change failed<br/><br/>";
	else echo "Could not find user $_POST[uname]<br/><br/>";
}
?>

<p>Enter the RP name for the person you want to generate a new password for.</p>
<form method="POST" action="passreset.php">
<input type="text" name="uname" size="32"/>
<br/>
<input type="submit" value="Submit"/>
</form>