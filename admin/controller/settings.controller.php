<?php

if(isset($_POST['update'])) {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $currency = $_POST['currency'];
    $recaptcha_public = $_POST['recaptcha_public'];
    $recaptcha_secret = $_POST['recaptcha_secret'];
    $cp_merchant = $_POST['cp_merchant'];
    $cp_secret = $_POST['cp_secret'];
    $cp_debug_email = $_POST['cp_debug_email'];
    $free_miner = $_POST['free_miner'];
    $free_miner_profit = $_POST['free_miner_profit'];
    $free_miner_end = $_POST['free_miner_end'];
    $referral_com = $_POST['referral_com'];
    $min_payout = $_POST['min_payout'];
    $home_subtitle = $_POST['home_subtitle'];   
    $home_join = $_POST['home_join'];
    $home_invest = $_POST['home_invest'];
    $home_about_short = $_POST['home_about_short'];
    $home_plans_description = $_POST['home_plans_description'];
    
    
    $update = Setting::update_settings($title, $description, $currency, $recaptcha_public, $recaptcha_secret, $cp_merchant, $cp_secret, $cp_debug_email, $free_miner, $free_miner_profit, $free_miner_end, $referral_com, $min_payout, $home_subtitle, $home_join, $home_invest, $home_about_short, $home_plans_description);
    
    if($update) {
        $session->message = "<div class='alert alert-info' role='alert'>Settings updated!</div>";
    } else {
        $session->message = "<div class='alert alert-danger' role='alert'>Something went wrong, please try again!</div>";
    }
    
    
    
}

?>

<?php 

$crypto = Coin::get_active_coin(); 
$coins = Coin::get_supported_coins();
$setting = Setting::settings(); 
?>