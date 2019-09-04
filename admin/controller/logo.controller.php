<?php

if(isset($_POST['update'])) {
    
    $logo = $_FILES['logo']['name'];
    $logo_tmp = $_FILES['logo']['tmp_name'];
    move_uploaded_file($logo_tmp, "../assets/img/$logo" );
    
    
    if(empty($logo)) {
        
         $session->message = "<div class='alert alert-warning' role='alert'>Upload a logo</div>";
        
    } else {
        
        $update = Setting::update_logo($logo);
        
        if($update) {
            $session->message = "<div class='alert alert-info' role='alert'>Logo was changed succesfully</div>";
        } else {
            $session->message = "<div class='alert alert-warning' role='alert'>Something went wrong!</div>";
        }
        
    }
    
}

?>