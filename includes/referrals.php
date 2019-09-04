<?php

class Referral {
    
    public $id;
    public $username;
    public $who_refer;
    public $created_date;
    
    
    public static function get_referrals_by_username($username) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM referrals WHERE who_refer = '{$username}' ORDER by id DESC LIMIT 10 ");
        
    }
    
    public static function count_refs($username) {
        
        global $database;
        
        $sql = "SELECT * FROM referrals WHERE who_refer = '$username'";
        $result = $database->query($sql);
        
        $result = mysqli_num_rows($result);
        
        return $result;
        
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