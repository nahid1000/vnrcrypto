<?php

if(isset($_POST['update'])) {
	
	$username = $_POST['username'];
	$email 	  = $_POST['email'];
	$balance  = $_POST['balance'];
	$deposit  = $_POST['total_deposit'];
	$address  = $_POST['payment_address'];
	$id       = $_POST['id'];
	
	if(empty($username) || empty($email) || empty($balance) || empty($deposit) || empty($address)) {
		$session->message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
							  All fields are required.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
	} else {
		
		$update = Users::update_user($username, $email, $balance, $deposit, $address, $id);
		
		if($update) {
			$session->message = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
							  User has been updated.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
		} else {
			$session->message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
							 Something went wrong, or try to change some values.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
		}
		
	}
	
}

?>

<?php 

if(isset($_POST['updateM'])) {
	
	$profit = $_POST['profit'];
	$username = $_POST['username'];
	
	if(empty($profit)) {
		$session->message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
							  Profit field cannot be empty.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
	} else {
		
		$find = Profit::profitperday($username);
		if(!$find) {
			$credited = date("Y-m-d", strtotime("-1 days"));
			$addMiner = Users::add_miner_manual($username, $profit, $credited);
			
			if($addMiner) {
				$session->message = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
							  Miner and daily profit was added to the user.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
			}
		} else {
			
			$updateMiner = Users::update_miner_manual($username, $profit);
			
			if($updateMiner) {
				$session->message = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
							  Daily profit was updated.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
			} else {
				$session->message = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
							  Something went wrong, change profit value.
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>";
			}
			
		}
		
	}
	
}

?>