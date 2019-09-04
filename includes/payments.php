<?php

class Payment {
    
    public $username;
    public $txid;
    public $status;
    public $value;
    public $deposit_date;
    public $fin;
    public $amount;
    
    
    public static function get_payments($username) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM payments WHERE username = '$username' ORDER BY id DESC LIMIT 10 ");
        
    }
    
    public static function get_all_payments() {
        
        global $database;
        
        return static::find_this_query("SELECT amount FROM withdrawals WHERE status = 'completed' ");
        
    }
    
    public static function get_all_deposits() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM payments WHERE fin = 'yes' ORDER by id DESC LIMIT 20 ");
        
    }
    
    public static function userTotalDeposit($username) {
        
        global $database;
        
        return self::find_this_query("SELECT value FROM payments WHERE username = '{$username}' AND fin = 'yes' ");
        
    }
    
    public static function usersTotalDeposit() {
        
        global $database;
        
        return self::find_this_query("SELECT value FROM payments WHERE fin = 'yes' ");
        
    }
    
    public static function count_withdrawals() {
		
		global $database;
		
		$sql = "SELECT * FROM withdrawals WHERE status = 'pending' ";
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