<?php

if(isset($_POST['send'])) {
    
    $name = $database->escape($_POST['name']);
    $email = $database->escape($_POST['email']);
    $message = $database->escape($_POST['message']);
    
    if(empty($name) || empty($email) || empty($message)) {
        
        $session->message = "<div class='alert alert-warning' role='alert'>All fields are required!</div>";
        
    } else {
        
       if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) { 
        
        $secret = $setting->recaptcha_secret;
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        
        if($responseData->success == true) {
			
				require_once ("includes/mailer.php");
					
					//Create a new PHPMailer instance
                    $mail = new PHPMailer;
                    //Tell PHPMailer to use SMTP
                    $mail->isSMTP();
                    //Set the hostname of the mail server
                    $mail->Host = $setting->smtp_host; 
                    //Set the SMTP port number - likely to be 25, 465 or 587
                    $mail->Port = $setting->smtp_port;
                    //Whether to use SMTP authentication
                    $mail->SMTPAuth = true;
                    //Username to use for SMTP authentication
                    $mail->Username = $setting->smtp_user;
                    //Password to use for SMTP authentication
                    $mail->Password = $setting->smtp_password;
                    //Set who the message is to be sent from
                    $mail->setFrom($email);
                    //Set an alternative reply-to address
                    $mail->addReplyTo($email);
                    //Set who the message is to be sent to
                    $mail->addAddress($setting->smtp_user);
					
					

					$mail->WordWrap = 50;                                 // set word wrap to 50 characters
					$mail->IsHTML(true);                                  // set email format to HTML

					$mail->Subject = "New message from contact";
					$mail->Body    = $message;
					

					if(!$mail->Send())
					{
					   $session->message = "<div class='alert alert-warning' role='alert'>
											Something went wrong!
											</div>";
					} else {
						
						$session->message = "<div class='alert alert-success' role='alert'>
											Email was sent, we will contact you soon!
											</div>";
						
					}

        
                    } else {
           
                        $session->message = "<div class='alert alert-warning' role='alert'>
											Captcha Error!
											</div>";
                    }
        
                    } else {
           
                        $session->message = "<div class='alert alert-warning' role='alert'>
											Captcha Error!
											</div>";
                    }
    
    
}
}
?>