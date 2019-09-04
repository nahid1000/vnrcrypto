<?php 

if(isset($_POST['reset'])) {
	
	
	$email = $database->escape($_POST['email']);
	
	if(empty($email)) {
		
		$session->message = "Type an email";
	} else {
	
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        
        $secret = $setting->recaptcha_secret;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        
        if($responseData->success == true) {
		
		$check = Users::find_user_by_email($email);
		
		if(!$check) {
			
			$session->message = "Email was not found!";
			
		} else {
			
			$newpass = randomPassword();
			$check->password = password_hash($newpass, PASSWORD_BCRYPT, array('cost' => 12));
					
			if($check->update()) {
				
				require_once ("includes/mailer.php");

					$mail = new PHPMailer();

					$mail->IsSMTP();                                      // set mailer to use SMTP
					$mail->Host = $setting->smtp_host;  // specify main and backup server
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = $setting->smtp_user;  // SMTP username
					$mail->Password = $setting->smtp_password; // SMTP password

					$mail->From = $setting->smtp_user;
					$mail->FromName = "Password Reset";
					$mail->addAddress("$email");                  // name is optional

					$mail->WordWrap = 50;                                 // set word wrap to 50 characters
					$mail->IsHTML(true);                                  // set email format to HTML

					$mail->Subject = "Your new password";
					$mail->Body    = "Hello,";
					$mail->Body   .= "<br>";
					$mail->Body   .= "Your new password is: $newpass<br>";
					$mail->Body   .= "You can now Login with your new password. <br>";
					$mail->Body   .= "<br>";
					$mail->Body   .= "Regards,<br>";
					$mail->Body   .= "$setting->title Team";
					

					if(!$mail->Send())
					{
					   $session->message = "<h4 class='text-center text-warning'>Something went wrong, please try again!<h4>";
					} else {
						
						$session->message = "<div class='alert alert-infi' role='alert'>
											Your new password was sent to your email
											</div>";
						
					}
				
			} else {
				
				$session->message = "<div class='alert alert-warning' role='alert'>
				<strong>Warning!</strong> Something went wrong!
			</div>";
				
			}
			
		}
            
        } else {
            
            $session->message = "<div class='alert alert-danger' role='alert'>
				<strong>Warning!</strong> Captcha error!
			</div>";
			  
			  
        }
        
    } else {
        
        $session->message = "<div class='alert alert-danger' role='alert'>
				<strong>Warning!</strong> Captcha error!
			</div>";
        
    }
	
}
}
	
	

?>