<?php

$passMessage = "";

if(isset($_POST['update'])) {
    
    $address = $_POST['payment_address'];
    $pass    = $_POST['password'];
    $newpass = $_POST['newpassword'];
    
    if(!empty($address)) {
        
        $user->payment_address = $address;
        
    }
    
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
        
       
        
    }
    
    $user->update();
    
    $session->message = "<div class='alert alert-primary' role='alert'>User profile was update!</div>";
    
}

?>