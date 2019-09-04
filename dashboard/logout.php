<?php require_once("includes/header.php"); ?>

<?php

if($session->is_signed_in()) {
	
	$user = Users::find_user_by_id($session->user_id);
	$user->logged_in = "No";
	$user->update();
	setcookie("drbc","",time()-365*1440*60);
	
}

$session->logout();
redirect("../login.php");

?>