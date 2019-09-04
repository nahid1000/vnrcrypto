<?php 

if(isset($_POST['update'])) {
    
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    
    if(empty($facebook) || empty($instagram) || empty($twitter)) {
        
        $session->message = "<div class='alert alert-danger' role='alert'>All fields are required!</div>";
        
    } else {
        
        $update = Setting::update_social($facebook, $instagram, $twitter);
        
        if($update) {
            $session->message = "<div class='alert alert-info' role='alert'>Social settings updated!</div>";
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Nothing changed!</div>";
        }
        
    }
    
}

?>

<?php $setting = Setting::settings(); ?>