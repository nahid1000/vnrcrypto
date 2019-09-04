<?php include('includes/header.php'); ?>

<?php     
    // Fill these in with the information from your CoinPayments.net account. 
    $cp_merchant_id = $setting->cp_merchant; 
    $cp_ipn_secret  = $setting->cp_secret; 
    $cp_debug_email = $setting->cp_debug_email; 
 

    function errorAndDie($error_msg) { 
        global $cp_debug_email; 
        if (!empty($cp_debug_email)) { 
            $report = 'Error: '.$error_msg."\n\n"; 
            $report .= "POST Data\n\n"; 
            foreach ($_POST as $k => $v) { 
                $report .= "|$k| = |$v|\n"; 
            } 
            mail($cp_debug_email, 'CoinPayments IPN Error', $report); 
        } 
        die('IPN Error: '.$error_msg); 
    } 

    if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') { 
        errorAndDie('IPN Mode is not HMAC'); 
    } 

    if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) { 
        errorAndDie('No HMAC signature sent.'); 
    } 

    $request = file_get_contents('php://input'); 
    if ($request === FALSE || empty($request)) { 
        errorAndDie('Error reading POST data'); 
    } 

    if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) { 
        errorAndDie('No or incorrect Merchant ID passed'); 
    } 

    $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret)); 
    if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) { 
    //if ($hmac != $_SERVER['HTTP_HMAC']) { <-- Use this if you are running a version of PHP below 5.6.0 without the hash_equals function 
        errorAndDie('HMAC signature does not match'); 
    } 
     
    // HMAC Signature verified at this point, load some variables. 

    $txn_id = $_POST['txn_id']; 
    $item_name = $_POST['item_name']; 
    $amount1 = floatval($_POST['amount1']); 
    $amount2 = floatval($_POST['amount2']);
    $currency1 = $_POST['currency1']; 
    $currency2 = $_POST['currency2']; 
    $status = intval($_POST['status']); 
    $status_text = $_POST['status_text']; 

    $findtx = Users::find_tx($txn_id);

    if($findtx !== false) {
           
		if($findtx->status != 100) {
			
			if ($status >= 100 || $status == 2) { 
			
			$UpdateTxidStatus = Users::update_txid($findtx->txid);
			
				 $payment = Users::find_txid($txn_id);
	
					if($payment) {
						
						$buyer = Users::find_user_by_usernameh($payment->username);
					
						$buyer->balance = $buyer->balance + $payment->value;
						$buyer->experience = $buyer->experience + $payment->value;
						$buyer->total_deposit = $buyer->total_deposit + $payment->value;
						if($buyer->update()) {
							
							$update_payment = Users::update_payment($payment->txid);
							
						}
						
								
						$findref = Users::get_ref($payment->username);
								
						if($findref) {			
							$payref = Users::find_user_by_usernameh($findref->who_refer);
									
							$refcom = ($setting->referral_com / 100) * $payment->value;

							$payref->balance = $payref->balance + $refcom;
							$payref->earnings = $payref->earnings + $refcom;
							$payref->update();
						
						
						
						}
					
					} else {
						die();
					}
			
			
			} else if ($status < 0) { 
				
			} else { 
				//payment is pending, you can optionally add a note to the order page 
			}
		}
        
    } else {
		
		$addtx = Users::add_txid($item_name, $txn_id, $amount1, $status);
	}

   
    
  