<?php 

if(isset($_POST['response'])) {
    
    $message = $_POST['message'];
    
    if(empty($message)) {
        $session->message = "<div class='alert alert-danger' role='alert'>Add a response to your ticket!</div>";
    } else {
        
        $ticketID = $_GET['id'];
    
        $verify = Ticket::verify_ticket_id($user->id, $ticketID);
        
        if($verify !== false) {
            
            $ticketAuthor = 'You';
            $addResponse = Ticket::add_ticket_response($ticketID, $user->id, $message, $ticketAuthor);
            
            $updateTicketStatus = Ticket::updateTicketStatusClient($ticketID);
            
            if($addResponse) {
                $session->message = "<div class='alert alert-info' role='alert'>Support team will review your ticket as soon as possible!</div>";
            } else {
                $session->message = "<div class='alert alert-danger' role='alert'>Something went wrong, please try again!</div>";
            }
            
        }
        
    }
    
}

?>

<?php

if(isset($_GET['id'])) {
    $ticketID = $_GET['id'];
    
    $verify = Ticket::verify_ticket_id($user->id, $ticketID);
    
    if($verify !== false) {
        $ticketInfo = Ticket::get_ticket($ticketID);
        $ticketAnswers = Ticket::get_ticket_answers($user->id, $ticketID);
    } else {
        redirect('/dashboard/support');
    }
    
} else {
    redirect('/dashboard/support');
}


?>