<?php
	if($_COOKIE['drbc']) {
	$session_id = $_COOKIE['drbc'];
	
	if($session_id !== $user->sessionid) {
		redirect('logout');
		die();
	}
	
}
?>