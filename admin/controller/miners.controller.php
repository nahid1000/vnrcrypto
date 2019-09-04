<?php 

if(isset($_POST['add'])) {
    
    $plan_name = $_POST['name'];
    $plan_percent = $_POST['percent'];
    $plan_profit = $_POST['profit'];
    $plan_duration = $_POST['duration'];
    $plan_price = $_POST['price'];
    $plan_image = $_FILES['miner_image']['name'];
    $plan_image_tmp = $_FILES['miner_image']['tmp_name'];
    move_uploaded_file($plan_image_tmp, "../dashboard/images/$plan_image" );
    
    if(empty($plan_name) || empty($plan_percent) || empty($plan_profit) || empty($plan_duration) || empty($plan_price) || empty($plan_image)) {

        $session->message = "<div class='alert alert-warning' role='alert'>All fields are required!</div>";
        
    } else {
        
        $add_new_miner = Miner::add_miner_to_plan_setting($plan_name, $plan_percent, $plan_profit, $plan_duration, $plan_price, $plan_image);
        
        if($add_new_miner) {
            
            $session->message = "<div class='alert alert-info' role='alert'>New miner was added!</div>";
            
        } else {
            
            $session->message = "<div class='alert alert-warning' role='alert'>Something went wrong!</div>";
            
        }
        
    }
    
}

?>

<?php 

if(isset($_POST['delete'])) {
    
    $minerID = $_POST['minerid'];
    
    $check = Plan::find_plan($minerID);
    
    if($check) {
        
        $delete = Plan::delete_plan($minerID);
        
        $session->message = "<div class='alert alert-info' role='alert'>Miner was removed</div>";
        
    } else {
        $session->message = "<div class='alert alert-info' role='alert'>Something went wrong!</div>";
    }
    
}

?>

<?php
$plans = Plan::get_plans(); 
?>

<?php $lastMiners = Users::get_latest_miners(); ?>