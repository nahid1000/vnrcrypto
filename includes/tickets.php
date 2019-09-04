<?php

class Ticket {
    
    public $id;
    public $user_id;
    public $type;
    public $title;
    public $message;
    public $status;
    public $created;
    public $ticket_id;
    public $ticket_user_id;
    public $ticket_message;
    public $ticket_created;
    public $ticket_author;
    
    
    public static function get_tickets($userID) {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM tickets WHERE user_id = '$userID' ORDER BY id DESC LIMIT 10 ");
        
    }
    
    public static function get_all_tickets() {
        
        global $database;
        
        return static::find_this_query("SELECT * FROM tickets WHERE status = 'pending' ORDER BY id DESC LIMIT 100 ");
        
    }
    
    public static function get_ticket_answers($user, $ticket) {
        
        global $database;
        
        $ticket = $database->escape($ticket);
        
        return static::find_this_query("SELECT * FROM ticket_answers WHERE ticket_user_id = '{$user}' AND ticket_id = '{$ticket}' ORDER BY id ASC ");
        
    }
    
    public static function get_ticket_answers_admin($ticket) {
        
        global $database;
        
        $ticket = $database->escape($ticket);
        
        return static::find_this_query("SELECT * FROM ticket_answers WHERE ticket_id = '{$ticket}' ORDER BY id ASC ");
        
    }
    
    public static function get_ticket($ticketID) {
        
        global $database;
        
        $ticketID = $database->escape($ticketID);
        
        $the_result_array = self::find_this_query("SELECT * FROM tickets WHERE id = $ticketID LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function verify_ticket_id($userID, $ticketID) {
        
        global $database;
        
        $userID = $database->escape($userID);
        $ticketID = $database->escape($ticketID);
        
        $the_result_array = self::find_this_query("SELECT * FROM tickets WHERE user_id = '{$userID}' AND id = '{$ticketID}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function verify_ticket($ticketID) {
        
        global $database;
        
        $ticketID = $database->escape($ticketID);
        
        $the_result_array = self::find_this_query("SELECT * FROM tickets WHERE id = '{$ticketID}' LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }
    
    public static function add_ticket($userID, $type, $title, $message) {
        
        global $database;
        
        $userID = $database->escape($userID);
        $type = $database->escape($type);
        $title = $database->escape($title);
        $message = $database->escape($message);
		$created = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO tickets (user_id, type, title, message, created, status) ";
        $sql .= "VALUES ('{$userID}','{$type}','{$title}', '{$message}', '{$created}', 'pending')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    
    public static function add_ticket_response($ticketID, $userID, $ticketMessage, $ticketAuthor) {
        
        global $database;
        
        $ticketID = $database->escape($ticketID);
        $userID = $database->escape($userID);
        $ticketMessage = $database->escape($ticketMessage);
		$ticketCreated = date("Y-m-d H:i:s");
        $ticketAuthor = $database->escape($ticketAuthor);
        
        $sql = "INSERT INTO ticket_answers (ticket_id, ticket_user_id, ticket_message, ticket_created, ticket_author) ";
        $sql .= "VALUES ('{$ticketID}','{$userID}','{$ticketMessage}', '{$ticketCreated}', '{$ticketAuthor}')";
        
        $result = $database->query($sql);
        
        if(!$result) {
            return false;
        } else {
            return true;
            
        }
        
    }
    
    public static function delete_ticket($id) {
        global $database;
		
		$id = $database->escape($id);
        
        $sql = "DELETE FROM tickets WHERE id = '$id' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false; 
        
    }
    
    public static function delete_ticket_answers($id) {
        global $database;
		
		$id = $database->escape($id);
        
        $sql = "DELETE FROM ticket_answers WHERE ticket_id = '$id' ";
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false; 
        
    }
    
    public static function count_tickets() {
		
		global $database;
		
		$sql = "SELECT * FROM tickets WHERE status = 'pending' ";
		$result = $database->query($sql);
		
		$result = mysqli_num_rows($result);
		
		return $result;
		
		
	}
    
    public static function updateTicketStatus($id) {
        
        global $database;
        
        $id = $database->escape($id);
        
        $sql = "UPDATE tickets SET ";
        $sql .= "status= 'replied' ";
        $sql .= " WHERE id= '{$id}' ";    
        $database->query($sql);
        
        return (mysqli_affected_rows($database->conn) == 1) ? true : false;
    }
    
    public static function updateTicketStatusClient($id) {
        
        global $database;
        
        $id = $database->escape($id);
        
        $sql = "UPDATE tickets SET ";
        $sql .= "status= 'pending' ";
        $sql .= " WHERE id= '{$id}' ";    
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