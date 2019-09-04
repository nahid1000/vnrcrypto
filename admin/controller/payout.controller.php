<?php 

if(isset($_POST['pay'])) {
	
	$id = $_POST['id'];
	
	$pay = Users::update_payment_request($id);
	
	if($pay) {
		
        $session->message = '<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Payment status changed to completed!</strong> 
            </div>';
		
	} else {
		$session->message = '<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Something went wrong!</strong> 
            </div>';
	}
	
}

?>

<?php 

$requests = Users::pendingRequests();

?>