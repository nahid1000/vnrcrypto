<?php 

$users = Users::count_registered();
$activeMiners = Users::count_active();
$pending_withdrawals = Payment::count_withdrawals();
$pending_tickets = Ticket::count_tickets();
$totalDeposits = Payment::usersTotalDeposit();

$balances = array();

if(!empty($totalDeposits)) {
	
	foreach($totalDeposits as $totalDeposit) {
		
		$balances[] = $totalDeposit->value;
		$userTotalDeposits = array_sum($balances);
		
	} 
} else {
		$userTotalDeposits = "0";
	}

?>

<?php

$totalWithdrawals = Payment::get_all_payments();

$balances = array();

if(!empty($totalWithdrawals)) {
	
	foreach($totalWithdrawals as $totalWithdrawal) {
		
		$balances[] = $totalWithdrawal->amount;
		$userTotalWithdrawals = array_sum($balances);
		
	} 
} else {
		$userTotalWithdrawals = "0";
	}

?>

<?php

$userBalances = Users::usersBalances();

$usersbalances = array();

if(!empty($userBalances)) {
	
	foreach($userBalances as $userBalance) {
		
		$usersbalances[] = $userBalance->balance;
		$totalUsersBalances = array_sum($usersbalances);
		
	} 
} else {
		$totalUsersBalances = "0";
	}

?>

<?php

$profits = Users::minersProfit();

$balances = array();

if(!empty($profits)) {
	
	foreach($profits as $profit) {
		
		$balances[] = $profit->profit;
		$profitday = array_sum($balances);
		
	} 
} else {
		$profitday = "0";
	}

?>

<?php 

$plans = Plan::get_plans(); 
$activeBonus = Plan::activeBonusMiners();
$expiredBonus = Plan::expiredBonusMiners();

?>