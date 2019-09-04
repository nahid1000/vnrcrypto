<?php require_once("../includes/header.php") ?>

<?php

$plan = Users::get_expired_plans();

if($plan !== false) {

	
	$make = Users::update_expired_miner($plan->author, $plan->profit);
	$updateStatus = Users::update_expired_miner_plan($plan->id);
	
}

?>