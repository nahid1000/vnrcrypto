<?php

$passMessage = "";

if(isset($_POST['update'])) {
    
    $username = $_POST['username'];
	$email    = $_POST['email'];
    $pass     = $_POST['password'];
    $newpass  = $_POST['newpassword'];
    
	if(empty($username) || empty($email)) {
		
		$session->message = "<div class='alert alert-warning' role='alert'>Username or email cannot be empty!</div>";
	} else { 
	
		if(!empty($pass) && empty($newpass)) {
        $passMessage = "<div class='alert alert-warning' role='alert'>Add new password</div>";
		}
    
		if(empty($pass) && !empty($newpass)) {
			$passMessage = "<div class='alert alert-warning' role='alert'>Check the password fields again</div>";
		}
    
		if(!empty($pass) && !empty($newpass)) {
        
			if(password_verify($pass,$user->password)) {
				
				$newpass = password_hash($newpass, PASSWORD_BCRYPT, array('cost' => 12));
				
				$user->password = $newpass;
				
				$passMessage = "<div class='alert alert-primary' role='alert'>Password was changed!</div>";
			} else {
				$passMessage = "<div class='alert alert-warning' role='alert'>Wrong current password!</div>";
			}
        
		} else {
			
			
			
		}
		
		$user->username = $username;
		$user->email = $email;
		$user->update_admin();
		$session->message = "<div class='alert alert-info' role='alert'>Admin profile was updated!</div>";
	}
   
}

?>