<?php

if(isset($_POST['request'])) {
	
	$address = $user->payment_address;
	$amount = $_POST['amount'];
	
	if($user->payment_address == "No Address") {
		$session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> Please add a {$setting->currency} address to be able to withdraw!</div>";
	} else {
		
		if(!is_numeric($amount)) {
        
        $session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> Something went wrong, please try again!</div>";
        
    } else {
        
        if($amount < $setting->min_payout) {
            
		$session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> {$setting->min_payout} {$setting->currency} minimum to withdraw!</div>";
            
	       } else {
		
		      if($user->balance < $amount) {
                  
			     $session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> Your balance is lower than your request!</div>";
                  
		      } else {

			     $add = Users::add_request($user->username, $address, $amount);
			
			     if($add) {

                    $user->balance = $user->balance - $amount;

                    $user->update();

                    $session->message = "<div class='alert alert-info' role='alert'><strong>Success</strong> Your request was recorded!</div>";
				
			}
			
			
			
		}
		
	}
        
    }
		
	} 
	
}


?>
<?php

$withdrawals = Users::get_withdrawal_requests($user->username);

?>
