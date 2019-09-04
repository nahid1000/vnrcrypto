<?php

class Coin {
    
    public $id;
    public $coin_full;
    public $coin_short;
    public $coin_icon;
    public $active;
    
    
    public static function get_active_coin() {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM supported_coins WHERE active = '1' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function get_supported_coins() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM supported_coins ");
        
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