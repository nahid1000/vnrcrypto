<?php

class Users {
    protected static $db_table = "users";
    public $id;
    public $ip;
    public $user_id;
    public $username;
    public $name;
    public $value;
    public $author;
    public $email;
    public $password;
    public $session;
    public $balance;
    public $payment_address;
    public $total_deposit;
    public $earnings;
    public $referral_id;
    public $icon;
    public $status;
    public $description;
    public $instructions;
    public $link;
    public $logged_in;
    public $sessionid;
    public $experience;
    public $txid;
	public $who_refer;
	public $fin;
	public $deposit_date;
	public $date;
	public $profit;
	public $price;
	public $amount;
	public $address;
	public $content;
	public $title;
	public $register_date;
   

    
 
	
	
	    public function update() {
        global $database;
        
        $sql = "UPDATE " .self::$db_table . " SET ";
        $sql .= "username= '" . $database->escape($this->username) . "', ";
        $sql .= "password= '" . $database->escape($this->password) . "', ";
        $sql .= "referral_id= '" . $database->escape($this->referral_id) . "', ";
        $sql .= "total_deposit= '" . $database->escape($this->total_deposit) . "', "; 
        $sql .= "earnings= '" . $database->escape($this->earnings) . "', ";
        $sql .= "payment_address= '" . $database->escape($this->payment_address) . "', ";    
        $sql .= "logged_in= '" . $database->escape($this->logged_in) . "', ";
        $sql .= "sessionid= '" . $database->escape($this->sessionid) . "', ";
        $sql .= "experience= '" . $database->escape($this->experience) . "', ";
        $sql .= "balance= '" . $database->escape($this->balance) . "' ";
        $sql .= " WHERE id= " . $database->escape($this->id);    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public function update_admin() {
        global $database;
        
        $sql = "UPDATE admin SET ";
        $sql .= "username= '" . $database->escape($this->username) . "', ";
        $sql .= "email= '" . $database->escape($this->email) . "', ";
        $sql .= "password= '" . $database->escape($this->password) . "' ";
        $sql .= " WHERE id= 1 ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	
	public static function update_user($username, $email, $balance, $deposit, $address, $id) {
        global $database;
        
		$username = $database->escape($username);
		$email	  = $database->escape($email);
		$balance  = $database->escape($balance);
		$deposit  = $database->escape($deposit);
		$address  = $database->escape($address);
		$id       = $database->escape($id);
		
        $sql = "UPDATE users SET ";
        $sql .= "username= '{$username}', ";
		$sql .= "email= '{$email}', ";
		$sql .= "balance= '{$balance}', ";
		$sql .= "total_deposit= '{$deposit}', ";
		$sql .= "payment_address= '{$address}' ";
        $sql .= " WHERE id= '{$id}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }

	
	public static function get_users_page($page_1, $per_page) {
        
        global $database;
        
		$page_1 = $database->escape($page_1);
		$per_page = $database->escape($per_page);
		
        return static::find_this_query("SELECT * FROM users ORDER by id DESC LIMIT {$page_1}, {$per_page} ");
        
    }

	
	public static function get_payments_all() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM payments WHERE status >= '100'  ORDER by id DESC LIMIT 10");
        
    }
	
	
	public static function get_payments_no($txid) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT txid FROM payments WHERE txid = '$txid' AND status = '100' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
   
	
	public static function find_tx($txn_id) {
        
        global $database;
        
        $the_result_r = self::find_this_query("SELECT * FROM payments WHERE txid = '{$txn_id}'  ");
        
        return !empty($the_result_r) ? array_shift($the_result_r) : false;
        
    }
	
	public static function find_txid($txn_id) {
        
        global $database;
        
        $the_result_r = self::find_this_query("SELECT * FROM payments WHERE txid = '{$txn_id}'  ");
        
        return !empty($the_result_r) ? array_shift($the_result_r) : false;
        
    }
	
	
	public static function get_latest_miners() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM plans WHERE end >= DATE(NOW()) AND name != 'free' ORDER by id DESC LIMIT 100  ");
        
    }
	
	
	public static function get_expired_plans() {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM plans WHERE end < DATE(NOW()) AND status = 'active' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }

	
	public static function get_nocredited($username) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM miners WHERE credited != DATE(NOW()) AND name = '{$username}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }

	
	public static function get_allnocredited() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM miners WHERE credited != DATE(NOW()) AND profit != 0 LIMIT 100  ");
        
    }
	

	
	public static function get_payments_sum() {
        
        global $database;
        
        return static::find_this_query("SELECT value FROM payments where status = 100 ");
        
    }
    
    
    
    public static function count_registered() {
        
        global $database;
        
        return static::find_this_query("SELECT id FROM users ORDER BY id DESC LIMIT 1  ");
        
    }
    
	
	public static function updateCredited($username) {
        global $database;
        
		$datenow = date('Y/m/d');
		
        $sql = "UPDATE miners SET ";
        $sql .= "credited= '$datenow' ";
        $sql .= " WHERE name= '{$username}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }

    
    public static function updateAdminSession($session) {
        global $database;
        
        $session = $database->escape($session);
        
        $sql = "UPDATE admin SET ";
        $sql .= "session= '{$session}' ";
        $sql .= " WHERE id= 1 ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }

	
    public static function find_all_users() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM " . static::$db_table . " ");
        
    }
	
	public static function find_all_emails() {
        
        global $database;
        
        return static::find_this_query("SELECT email FROM " . static::$db_table . " ");
        
    }
	
	
	public static function total_members() {
        
        global $database;
        
        return static::find_this_query("SELECT id FROM users ORDER BY id DESC LIMIT 1  ");
        
    }

    
	
	public static function find_username($username) {
        
        global $database;
		
		$username = $database->escape($username);
        
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "id = '{$username}' ";
        $sql .= "LIMIT 1";
        $the_result_username = self::find_this_query($sql);
        
        return !empty($the_result_username) ? array_shift($the_result_username) : false;
        
    }
	
	public static function find_usernameOrEmail($username) {
        
        global $database;
		
		$username = $database->escape($username);
        
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
		$sql .= "OR email = '{$username}' ";
        $sql .= "LIMIT 1";
        $the_result_username = self::find_this_query($sql);
        
        return !empty($the_result_username) ? array_shift($the_result_username) : false;
        
    }
	
    
    public static function find_user_by_id($user_id) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function find_admin_by_id($user_id) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM admin WHERE id = $user_id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	

	public static function find_user_by_usernameh($username) {
        
        global $database;
        
        $username = $database->escape($username);
        
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
	
    
    public static function get_admin() {
        
        global $database;
        
        $sql = "SELECT * FROM admin WHERE ";
        $sql .= "id = 1 ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function find_new_user($username) {
        
        global $database;
        
        $username = $database->escape($username);
        
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE username = '{$username}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
    
    
    public static function verify_user($email) {
        
        global $database;
        
        $email = $database->escape($email);
        
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "email = '{$email}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function verify_admin($username) {
        
        global $database;
        
        $username = $database->escape($username);
        
        $sql = "SELECT * FROM admin WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function find_session($session_id) {
        
        global $database;
		
		$session_id = $database->escape($session_id);
        
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE sessionid = '{$session_id}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }

    
    public function create() {
        
        global $database;
        
        $sql = "INSERT INTO " .self::$db_table . " (email, username, password) ";
        $sql .= "VALUES ('";
        $sql .= $database->escape($this->email) . "', '";
        $sql .= $database->escape($this->username) . "', '";
        $sql .= $database->escape($this->password) . "')";
        
        if($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
        
    }

	
    public function delete() {
        global $database;
        
        $sql = "DELETE FROM " .self::$db_table . " ";
        $sql .= " WHERE id=" . $database->escape($this->id);
        $sql .= "LIMIT 1";
        
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            

    } 

    public static function username_exists($username) {
        
        global $database;
        
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $database->query($sql);
        
        $result = mysqli_num_rows($result);
        
        if($result > 0) {
            return true;
        } else {
            return false;
        }
        
        
    }
    
    public static function email_exists($email) {
        
        global $database;
        
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $database->query($sql);
        
        $result = mysqli_num_rows($result);
        
        if($result > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    
    
    public static function register_user($username, $email, $password, $ip) {
        
        global $database;
        
        $username = $database->escape($username);
        $email = $database->escape($email);
        $password = $database->escape($password);
		$reg_date = date("Y-m-d H:i:s");
        $address = "No Address";
        
        
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        
        $sql = "INSERT INTO users (ip, username, email, password, referral_id, payment_address , register_date) ";
        $sql .= "VALUES ('{$ip}','{$username}','{$email}','{$password}', '{$username}', '{$address}', '{$reg_date}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    } // END OF REGISTER USER METHOD
    
    
    public static function check_ip_ref($ip) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM users WHERE ip = '{$ip}' ");
        
    }
    
    
    public static function add_referral($username, $r) {
        
        global $database;
        
        $username = $database->escape($username);
        $r = $database->escape($r);
        
        
        $sql = "INSERT INTO referrals (username, who_refer) ";
        $sql .= "VALUES ('{$username}', '{$r}') ";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    

    public static function paid_refs($username) {
        
        global $database;
        
        return static::find_this_query("SELECT who_refer FROM referrals WHERE username = '{$username}' ");
        
    }
	
	public static function get_ref($username) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT who_refer FROM referrals WHERE username = '{$username}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function find_who_ref_by_username($who_refer) {
        
        global $database;
        
        $sql = "SELECT * FROM referrals WHERE ";
        $sql .= "who_refer = '{$who_refer}' ";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
	
	public static function find_user_by_email($email) {
        
        global $database;
		
		$email = $database->escape($email);
        
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "email = '{$email}' ";
        $sql .= "LIMIT 1";
        $the_result_email = self::find_this_query($sql);
        
        return !empty($the_result_email) ? array_shift($the_result_email) : false;
        
    }
    
    public static function find_user_by_username($r) {
        
        global $database;
        
        $r = $database->escape($r);
        
        $the_result_r = self::find_this_query("SELECT * FROM users WHERE username = '{$r}' ");
        
        return !empty($the_result_r) ? array_shift($the_result_r) : false;
        
    }


    
    public static function find_ref_paid($username) {
        
        global $database;
		
		$username = $database->escape($username);
        
        $sql = "SELECT who_refer FROM referrals WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
    
    public static function checkCredited($creditDate) {
	
	if(strtotime($creditDate) < strtotime('-1 days')) {
		return true;
	} else {
		return false;
	}
	
    }
    

    
    public static function updateno() {
        
        global $database;
        
        $sql = "UPDATE users SET ";
        $sql .= "logged_in= 'No' ";
        $sql .= " WHERE logged_in= 'Yes' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }
	
	
	public static function update_expired_miner($username, $profit) {
        global $database;
        
        
        $sql = "UPDATE miners SET ";
        $sql .= "profit= profit - '$profit' ";
        $sql .= " WHERE name= '{$username}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public static function update_miner_manual($username, $profit) {
        global $database;
        
		$username = $database->escape($username);
		$profit   = $database->escape($profit);
		
        $sql = "UPDATE miners SET ";
        $sql .= "profit= '{$profit}' ";
        $sql .= " WHERE name= '{$username}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public static function update_expired_miner_plan($id) {
        global $database;
        
        
        $sql = "UPDATE plans SET ";
        $sql .= "status= 'expired' ";
        $sql .= " WHERE id= '{$id}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public static function update_miner_free($username, $profit) {
        global $database;
        
        
        $sql = "UPDATE miners SET ";
        $sql .= "profit= profit + '$profit' ";
        $sql .= " WHERE name= '{$username}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }

	
	public static function add_free_miner($name, $profit) {
        
        global $database;
        
        $name = $database->escape($name);
		$profit = $database->escape($profit);

 
        $sql = "INSERT INTO miners (name, profit) ";
        $sql .= "VALUES ('{$name}','{$profit}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
	
	public static function add_miner_manual($name, $profit, $credited) {
        
        global $database;
        
        $name = $database->escape($name);
		$profit = $database->escape($profit);

 
        $sql = "INSERT INTO miners (name, profit, credited) ";
        $sql .= "VALUES ('{$name}','{$profit}', '{$credited}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }

	
	public static function add_request($username, $address, $amount) {
        
        global $database;
        
        $username = $database->escape($username);
        $address = $database->escape($address);
		$amount = $database->escape($amount);
		$datenow = date("Y-m-d H:i:s");
        
        
        $sql = "INSERT INTO withdrawals (name, address, amount, date, status) ";
        $sql .= "VALUES ('{$username}', '{$address}', '{$amount}', '{$datenow}', 'pending') ";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
	
	
	public static function add_txid($item_name ,$txn_id, $value, $status_text) {
        
        global $database;
		
		$datenow = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO payments (username, txid, value, status, deposit_date) ";
        $sql .= "VALUES ('{$item_name}','{$txn_id}', '{$value}', '{$status_text}', '{$datenow}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
                                  
	
	public static function update_txid($txid) {
        global $database;
		
		$datenow = date('Y/m/d');
        
        $sql = "UPDATE payments SET ";
        $sql .= "status=  '100', ";
        $sql .= "deposit_date= '$datenow' ";
        $sql .= " WHERE txid= '{$txid}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public static function update_payment($txid) {
        global $database;
        
        $sql = "UPDATE payments SET ";
        $sql .= "fin= 'yes' ";
        $sql .= " WHERE txid= '{$txid}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
            
            
    }
	
	public static function get_withdrawal_requests($username) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM withdrawals WHERE name = '$username' ORDER BY id DESC LIMIT 10 ");
        
    }
	
	
    public static function get_payment($txid) {
        
        global $database;
        
        $the_result_array = self::find_this_query("SELECT * FROM payments WHERE txid = $txid LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
	public static function update_payment_request($id) {
        
        global $database;
        
        $sql = "UPDATE withdrawals SET ";
        $sql .= "status= 'completed' ";
        $sql .= " WHERE id= '{$id}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }
	
	
	public static function pendingRequests() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM withdrawals ORDER BY id DESC limit 100");
        
    }
	
	public static function completedWithdrawals() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM withdrawals WHERE status = 'completed' ORDER BY id DESC LIMIT 20");
        
    }
	
	
	public static function count_active() {
		
		global $database;
		
		$sql = "SELECT * FROM plans WHERE end >= DATE(NOW()) AND status = 'active'";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
	
	
	public static function userInfo($username) {
        
        global $database;
		
		$username = $database->escape($username);
        
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
	
    public static function minersProfit() {
        
        global $database;
        
        return self::find_this_query("SELECT profit FROM miners WHERE profit != 0 ");
        
        
    }
	
	public static function usersBalances() {
        
        global $database;
        
        return self::find_this_query("SELECT balance FROM users WHERE balance != 0 ");
        
        
    }
	
	
	public static function count_users() {
        
        global $database;
        
        $sql = "SELECT * FROM users ";
        $result = $database->query($sql);
        
        $result = mysqli_num_rows($result);
		
        return $result;
        
    }
	
	
	public static function find_view_session($session_id) {
        
        global $database;
		
		$session_id = $database->escape($session_id);
        
        $the_result_array = self::find_this_query("SELECT * FROM views WHERE sessionid = '{$session_id}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
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
                                  
                                  
    
} // END OF USERS CLASS


?>