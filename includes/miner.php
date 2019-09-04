<?php

class Miner {
    
    public $id;
    public $name;
    public $value;
    public $profit;
    public $end;
    public $author;
    public $status;
    public $buy_date;
    public $credited;
    
    public static function get_plans_by_username($id) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM plans WHERE author = '{$id}' ORDER by id DESC  ");
        
    }
    
    public static function add_miner_to_plans($name, $value, $profit, $end, $username) {
        
        global $database;
        
        $name = $database->escape($name);
        $value = $database->escape($value);
		$profit = $database->escape($profit);
		$end = $database->escape($end);
		$author = $database->escape($username);
		$status = "active";
		$buy_date = date("Y-m-d H:i:s");

 
        $sql = "INSERT INTO plans (name, value, profit, end, author, status, buy_date) ";
        $sql .= "VALUES ('{$name}','{$value}','{$profit}','{$end}','{$author}', '{$status}', '{$buy_date}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    
    public static function add_miner($name, $profit, $credited) {
        
        global $database;
        
        $name = $database->escape($name);
		$profit = $database->escape($profit);
		$credited = $database->escape($credited);

 
        $sql = "INSERT INTO miners (name, profit, credited) ";
        $sql .= "VALUES ('{$name}','{$profit}','{$credited}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    
    public static function add_miner_to_plan_setting($name, $percent, $profit, $duration, $price, $image) {
        
        global $database;
        
        $name = $database->escape($name);
		$percent = $database->escape($percent);
		$profit = $database->escape($profit);
        $duration = $database->escape($duration);
        $price = $database->escape($price);
        $image = $database->escape($image);

 
        $sql = "INSERT INTO plans_setting (plan_name, plan_percent, plan_profit, plan_duration, plan_price, plan_image) ";
        $sql .= "VALUES ('{$name}','{$percent}','{$profit}', '{$duration}', '{$price}', '{$image}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    
    public static function count_miners($username) {
        
        global $database;
        
        $sql = "SELECT * FROM plans WHERE author = '{$username}' AND end >= DATE(NOW()) ";
        $result = $database->query($sql);
        
        $result = mysqli_num_rows($result);
        
        return $result;
        
    }
    
    public static function checkMiner($username) {
        
        global $database;
		
		$username = $database->escape($username);
        
        $the_result_array = self::find_this_query("SELECT name FROM miners WHERE name = '$username' LIMIT 1 ");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function update_miner($username, $profit) {
        global $database;
        
        
        $sql = "UPDATE miners SET ";
        $sql .= "profit= profit + '$profit' ";
        $sql .= " WHERE name= '{$username}' ";    
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