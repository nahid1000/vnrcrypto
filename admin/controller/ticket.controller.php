<?php 

if(isset($_POST['response'])) {
    
    $message = $_POST['message'];
    
    if(empty($message)) {
        $session->message = "<div class='alert alert-danger' role='alert'>Add a response to your ticket!</div>";
    } else {
        
        $ticketID = $_GET['id'];
    
        $verify = Ticket::verify_ticket($ticketID);
        
        if($verify !== false) {
            
            $ticketAuthor = 'Support';
            $addResponse = Ticket::add_ticket_response($ticketID, $verify->user_id, $message, $ticketAuthor);
            
            if($addResponse) {
                $session->message = "<div class='alert alert-info' role='alert'>Reply added to ticket!</div>";
                
                $updateTicketStatus = Ticket::updateTicketStatus($ticketID);
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
    
    $verify = Ticket::verify_ticket($ticketID);
    
    if($verify !== false) {
        $ticketInfo = Ticket::get_ticket($ticketID);
        $ticketAnswers = Ticket::get_ticket_answers_admin($ticketID);
    } else {
        redirect('tickets.php');
    }
    
} else {
    redirect('tickets.php');
}


?>