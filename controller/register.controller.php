<?php

if($session->is_signed_in()) {
    redirect("index");
}

if(isset($_POST['register'])) {
	
   if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
       
       
        $secret = $setting->recaptcha_secret;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
       
        if($responseData->success == true) {
            
             $username = strtolower(trim($_POST['username']));
             $email = strtolower(trim($_POST['email']));
             $password = trim($_POST['password']);
             $ip = getip();
             $r = isset($_POST['r']) ? trim($_POST['r']) : '';
    
    $error = [
      
        'username'=> '',
        'email'=> '',
        'password' => ''
        
    ];
    
    if(strlen($username) < 4) {
        $error['username'] = "<div class='alert alert-warning' role='alert'>Username needs to be longer!</div>";
    }
    
    if($username == '') {
        $error['username'] = "<div class='alert alert-warning' role='alert'>Username filed cannot be empty!</div>";
    }
    
    $check_username = Users::username_exists($username);
    
    if($check_username == true) {
        $error['username'] = "<div class='alert alert-warning' role='alert'>This username already exists!</div>";
    }
    
    if($email == '') {
        $error['email'] = "<div class='alert alert-warning' role='alert'>Email field cannot be empty!</div>";
    }
    
    $check_email = Users::email_exists($email);
    
    if($check_email == true) {
        $error['email'] = "<div class='alert alert-warning' role='alert'>Email already exists!</div>";
    }
    
    if($password == '') {
        $error['password'] = "<div class='alert alert-warning' role='alert'>Password filed cannot be empty!</div>";
    }
    
    foreach($error as $key => $value) {
        if(empty($value)) {
            unset($error[$key]);
        }
    }
    
    if(empty($error)) {
        
        if($r != '' || !empty($r)) {

            $ref_exists = Users::find_user_by_username($r);
            
            if($ref_exists) {
				
				$check_fraud = Users::check_ip_ref($ip);
            
                if(!$check_fraud){
                
                $add_referal = Users::add_referral($username, $r);   
                    
                $register_user = Users::register_user($username, $email, $password, $ip);
        
                if($register_user == true) {

					$session->message = "<div class='alert alert-primary' role='alert'>Your account was registered, you can Log in now!</div>";
                    
                    if($setting->free_miner == 1) {
                        
                        $new_user = Users::find_new_user($username);
                        
                        $minername = "free";
                        $minervalue = "0";
                        $minerprofit = $setting->free_miner_profit;
                        $minerend = date("Y-m-d", strtotime("+{$setting->free_miner_end} days"));
                        $minerauthor = $new_user->id;
                        $minerstatus = "active";

                        Miner::add_miner_to_plans($minername, $minervalue, $minerprofit, $minerend, $minerauthor, $minerstatus);

                        $credited = date("Y-m-d", strtotime("-1 days"));

                        $minerProfit = $setting->free_miner_profit;

                        $addMiner = Miner::add_miner($new_user->id, $minerProfit, $credited);
                        
                    }
       
                }
            
                
                } else {
                    $session->message = "<div class='alert alert-primary' role='alert'>You cannot be your own referral!</div>";
                
                    }
                
            } 
            
        } else {
					
				$check_fraud = Users::check_ip_ref($ip);
				
				if(!$check_fraud) {
					
				$register_user = Users::register_user($username, $email, $password, $ip);
        
                if($register_user == true) {

					$session->message = "<div class='alert alert-primary' role='alert'>Your account was registered, you can Log in now!</div>";
					
					if($setting->free_miner == 1) {
                        
                        $new_user = Users::find_new_user($username);
                        
                        $minername = "free";
                        $minervalue = "0";
                        $minerprofit = $setting->free_miner_profit;
                        $minerend = date("Y-m-d", strtotime("+{$setting->free_miner_end} days"));
                        $minerauthor = $new_user->id;
                        $minerstatus = "active";

                        Miner::add_miner_to_plans($minername, $minervalue, $minerprofit, $minerend, $minerauthor, $minerstatus);

                        $credited = date("Y-m-d", strtotime("-1 days"));

                        $minerProfit = $setting->free_miner_profit;

                        $addMiner = Miner::add_miner($new_user->id, $minerProfit, $credited);
                        
                    }

                }
					
				} else {
					
					$session->message = "<div class='alert alert-primary' role='alert'>Only one account allowed!</div>";
					
				}
					
        
			}
            
        }
            
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> Captcha error, please try again!</div>";
        }
       
   }  else {
            
            $session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> Captcha error, please solve the captcha!</div>";
        }      

	
}

?>
