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

$tickets = Ticket::get_all_tickets();

?>