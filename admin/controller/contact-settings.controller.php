<?php 

if(isset($_POST['update'])) {
    
    $street = $_POST['street'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $about_text = $_POST['about_text'];
    
    if(empty($street) || empty($email) || empty($telephone) || empty($about_text)) {
        
        $session->message = "<div class='alert alert-danger' role='alert'>All fields are required!</div>";
        
    } else {
        
        $update = Setting::update_contact($street, $email, $telephone, $about_text);
        
        if($update) {
            
            $session->message = "<div class='alert alert-info' role='alert'>Contact settings updated!</div>";
            
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Nothing change!</div>";
            
        }
        
    }
    
}

?>

<?php $setting = Setting::settings(); ?>