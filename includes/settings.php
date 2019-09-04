<?php

class Setting {
    
    public $id;
    public $title;
    public $description;
    public $logo;
    public $currency;
    public $home_subtitle;
    public $home_join;
    public $home_invest;
    public $home_about_short;
    public $home_plans_description;
    public $free_miner;
    public $recaptcha_public;
    public $recaptcha_secret;
    public $cp_merchant;
    public $cp_secret;
    public $cp_debug_email;
    public $free_miner_profit;
    public $free_miner_end;
    public $referral_com;
    public $min_payout;
    public $coin_full;
    public $coin_short;
    public $coin_icon;
    public $active;
    public $facebook;
    public $instagram;
    public $twitter;
    public $street;
    public $email; 
    public $telephone;
    public $about_text;
    public $smtp_host;
    public $smtp_user;
    public $smtp_password;
    public $smtp_port;
    public $smtp_secure;
    
    
    public static function settings() {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM settings WHERE id = 1 LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function currency_info($name) {
        
        global $database;
        
        $sql = self::find_this_query("SELECT * FROM supported_coins WHERE coin_full = '{$name}' LIMIT 1 ");
        
        return !empty($sql) ? array_shift($sql) : false;
        
    }
    
    public static function update_social($facebook, $instagram, $twitter) {
        
        global $database;
        
        $facebook = $database->escape($facebook);
        $instagram = $database->escape($instagram);
        $twitter = $database->escape($twitter);
        
        $sql = "UPDATE settings SET ";
        $sql .= "facebook= '{$facebook}', ";
        $sql .= "instagram= '{$instagram}', ";
        $sql .= "twitter= '{$twitter}' ";
        $sql .= " WHERE id = '1' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
        
    }
    
    public static function update_logo($logo) {
        
        global $database;
        
        $logo = $database->escape($logo);
        
        $sql = "UPDATE settings SET ";
        $sql .= "logo= '{$logo}' ";
        $sql .= " WHERE id = '1' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
        
    }
    
    public static function update_contact($street, $email, $telephone, $about_text) {
        
        global $database;
        
        $street = $database->escape($street);
        $email = $database->escape($email);
        $telephone = $database->escape($telephone);
        $about_text = $database->escape($about_text);
        
        $sql = "UPDATE settings SET ";
        $sql .= "street= '{$street}', ";
        $sql .= "email= '{$email}', ";
        $sql .= "telephone= '{$telephone}', ";
        $sql .= "about_text= '{$about_text}' ";
        $sql .= " WHERE id = '1' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
        
    }
    
    public static function update_smtp($host, $user, $password, $port, $secure) {
        
        global $database;
        
        $host = $database->escape($host);
        $user = $database->escape($user);
        $password = $database->escape($password);
        $port = $database->escape($port);
        $secure = $database->escape($secure);
        
        $sql = "UPDATE settings SET ";
        $sql .= "smtp_host= '{$host}', ";
        $sql .= "smtp_user= '{$user}', ";
        $sql .= "smtp_password= '{$password}', ";
        $sql .= "smtp_port= '{$port}', ";
        $sql .= "smtp_secure= '{$secure}' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
        
    }
    
    public static function update_settings($title, $description, $currency, $recaptcha_public, $recaptcha_secret, $cp_merchant, $cp_secret, $cp_debug_email, $free_miner, $free_miner_profit, $free_miner_end, $referral_com, $min_payout, $home_subtitle, $home_join, $home_invest, $home_about_short, $home_plans_description) {
        
        global $database;
        
        $title = $database->escape($title);
        $description = $database->escape($description);
        $currency = $database->escape($currency);
        $recaptcha_public = $database->escape($recaptcha_public);
        $recaptcha_secret = $database->escape($recaptcha_secret);
        $cp_merchant = $database->escape($cp_merchant);
        $cp_secret = $database->escape($cp_secret);
        $cp_debug_email = $database->escape($cp_debug_email);
        $free_miner = $database->escape($free_miner);
        $free_miner_profit = $database->escape($free_miner_profit);
        $free_miner_end = $database->escape($free_miner_end);
        $referral_com = $database->escape($referral_com);
        $min_payout = $database->escape($min_payout);
        $home_subtitle = $database->escape($home_subtitle);
        $home_join = $database->escape($home_join);
        $home_invest = $database->escape($home_invest);
        $home_about_short = $database->escape($home_about_short);
        $home_plans_description = $database->escape($home_plans_description);
         
        
        $sql = "UPDATE settings SET ";
        $sql .= "title= '$title', ";
        $sql .= "description= '$description', ";
        $sql .= "currency= '$currency', ";
        $sql .= "recaptcha_public= '$recaptcha_public', ";
        $sql .= "recaptcha_secret= '$recaptcha_secret', ";
        $sql .= "cp_merchant= '$cp_merchant', ";
        $sql .= "cp_secret= '$cp_secret', ";
        $sql .= "cp_debug_email= '$cp_debug_email', ";
        $sql .= "free_miner= '$free_miner', ";
        $sql .= "free_miner_profit= '$free_miner_profit', ";
        $sql .= "free_miner_end= '$free_miner_end', ";
        $sql .= "referral_com= '$referral_com', ";
        $sql .= "min_payout= '$min_payout', ";
        $sql .= "home_subtitle= '$home_subtitle', ";
        $sql .= "home_join= '$home_join', ";
        $sql .= "home_invest= '$home_invest', ";
        $sql .= "home_about_short= '$home_about_short', ";
        $sql .= "home_plans_description= '$home_plans_description' ";
        $sql .= " WHERE id= '1' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
    
    
    public static function find_this_query($sql) {
        
        global $database;
        
        $result_set = $database->query($sql);
        $the_object_array = array();
        
        while($row = mysqli_fetch_array($result_set)) {
            
            $the_object_array[] = self::instantation($row);
            
        }
        
        return $the_object_array;
        
    }
	
	public static function instantation($the_record) {
        
        $the_object = new self;
        
        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        
        return $the_object;
        
    }
	
	private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        
        return array_key_exists($the_attribute, $object_properties);
    }
    
}

?>