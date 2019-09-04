<?php 

if(isset($_POST['update'])) {
    
    $host = $_POST['host'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $port = $_POST['port'];
    $secure = $_POST['secure'];
    
    if(empty($host) || empty($user) || empty($password) || empty($port) || empty($secure)) {
        
        $session->message = "<div class='alert alert-danger' role='alert'>All fields are required!</div>";
        
    } else {
        
        $update = Setting::update_smtp($host, $user, $password, $port, $secure); 
        
        if($update) {
            
            $session->message = "<div class='alert alert-info' role='alert'>SMTP Settings changed!</div>";
            
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Nothing change!</div>";
            
        }
        
    }
    
}

?>

<?php $setting = Setting::settings(); ?>