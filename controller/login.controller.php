<?php

if(isset($_POST['login'])) {
    
	
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        
        $secret = $setting->recaptcha_secret;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        
        if($responseData->success == true) {
			
			$email = trim($_POST['email']);
			$password = $database->escape(trim($_POST['password']));
			
			$user_found = Users::verify_user($email);
			
			if($user_found) {
        
			if(password_verify($password,$user_found->password)) {
				
				$session->login($user_found);				
				redirect("dashboard/");
            
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Incorect credentials!</div>";
        }
        
		} else {
        $session->message = "<div class='alert alert-warning' role='alert'>Email not founded!</div>";
		}
			
		} else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Captcha Error!</div>";
        }
	} else {
		
		$session->message = "<div class='alert alert-warning' role='alert'>Captcha Error!</div>";
		
	}
   
}

?>