<?php 

$myplans = Miner::get_plans_by_username($user->id);
$countminers = Miner::count_miners($user->id);
$profitperday = Profit::profitperday($user->id);
$payments = Payment::get_payments($user->username);
$withdrawals = Users::get_withdrawal_requests($user->username);
$referrals = Referral::get_referrals_by_username($user->username);
$countrefs = Referral::count_refs($user->username);

$usertds = Payment::userTotalDeposit($user->username);

$balances = array();

if(!empty($usertds)) {
	
	foreach($usertds as $usertd) {
		
		$balances[] = $usertd->value;
		$userTotalDeposits = array_sum($balances);
		
	} 
} else {
		$userTotalDeposits = "0";
	}

?>

