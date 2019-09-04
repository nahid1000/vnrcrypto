<?php 

if(isset($_POST['create'])) {
    
    $userID = $user->id;
    $type = $_POST['type'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    
    if(empty($type) || empty($title) || empty($message)) {
        $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Fields cannot be empty!</div>";
    } else {
        
        if($type < 1 || $type > 5) {
            $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrongG!</div>";
        } else {
            
            if($type == 1) {
                $type = 'Technical';
            }
            if($type == 2) {
                $type = 'Financial';
            }
            if($type == 3) {
                $type = 'Suggestion';
            }
            if($type == 4) {
                $type = 'Other';
            }
            
            $add = Ticket::add_ticket($userID, $type, $title, $message);
        
            if($add) {
                $session->message = "<div class='alert alert-info' role='alert'>Your ticket was created, you will receive a response soon!</div>";
            } else {
                $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong!</div>";
            }
            
            
        }
    
    }
    
}

?>

<?php 

if(isset($_POST['delete'])) {
    
    $ticketID = $_POST['ticketID'];
    
    $find_ticket = Ticket::verify_ticket_id($user->id, $ticketID);
        
    if($find_ticket !== false) {
        
        $delete = Ticket::delete_ticket($ticketID);
        
        $delete_answers = Ticket::delete_ticket_answers($ticketID);
        
        if($delete) {
            $session->message = "<div class='alert alert-info' role='alert'>Your ticket was removed!</div>";
        } else {
            $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong!</div>";
        }
        
        
    } else {
        $session->message = "<div class='alert alert-danger' role='alert'><strong>Warning!</strong> Something went wrong!</div>";
    }    
    
    
}

?>

<?php 

$tickets = Ticket::get_tickets($user->id);

?>