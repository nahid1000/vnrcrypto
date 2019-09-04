<?php

if(isset($_POST['login'])) {
    
	
	        $username = trim($_POST['username']);
			$password = $database->escape(trim($_POST['password']));
			
			$user_found = Users::verify_admin($username);
			
			if($user_found) {
        
			if(password_verify($password,$user_found->password)) {
                
					
					$session->login_admin($user_found);
					
					redirect("dashboard.php");

            
            } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Incorect credentials!</div>";
            }
        
		  } else {
            $session->message = "<div class='alert alert-warning' role='alert'>Incorect credentials!</div>";
		  }
   
}

?>