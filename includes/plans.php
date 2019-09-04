<?php

class Plan {
    
    public $id;
    public $name;
    public $value;
    public $profit;
    public $end;
    public $author;
    public $status;
    public $buy_date;
    public $plan_name;
    public $plan_percent;
    public $plan_profit;
    public $plan_duration;
    public $plan_price;
    public $plan_image;
    
    
    public static function get_plans() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM plans_setting ");
        
    }
    
    public static function get_plans_by_username($username) {
        
        global $database;
        
        $username = $database->escape($username);
        
        return static::find_this_query("SELECT * FROM plans WHERE author = '{$username}' ORDER by id DESC  ");
        
    }
    
    public static function find_plan($id) {
        
        global $database;
        
        $id = $database->escape($id);
        
        $the_result_array = self::find_this_query("SELECT * FROM plans_setting WHERE id = $id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function getActiveStats($name) {
		
		global $database;
		
		$sql = "SELECT * FROM plans WHERE end >= DATE(NOW()) AND name = '{$name}' ";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
    
    public static function getExpiredStats($name) {
		
		global $database;
		
		$sql = "SELECT * FROM plans WHERE end <= DATE(NOW()) AND name = '{$name}' ";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
    
    public static function activeBonusMiners() {
		
		global $database;
		
		$sql = "SELECT * FROM plans WHERE end >= DATE(NOW()) AND value = 0 ";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
	
	public static function expiredBonusMiners() {
		
		global $database;
		
		$sql = "SELECT * FROM plans WHERE end <= DATE(NOW()) AND value = 0 ";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
    
    public static function delete_plan($id) {
        
        global $database;
        
        $id = $database->escape($id);
        
        $sql = "DELETE from plans_setting WHERE id = '{$id}' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1 ) ? true : false;
        
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