<?php require_once("../includes/header.php") ?>

<?php

$plans = Users::get_allnocredited();

if($plans) {
	
	foreach($plans as $plan) {
	
		$user = Users::find_username($plan->name);
	
		$user->balance = $user->balance + $plan->profit;
		
		$user->update();
		
		$updateCredited = Users::updateCredited($user->id);
	
	}
	
} 

?>