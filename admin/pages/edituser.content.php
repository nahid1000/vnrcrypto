<?php

$get = $_GET['id'];



if(empty($get)) {
	
	redirect('users');
	
} else {
	
	$user = Users::find_user_by_id($get);
	
	if($user == false) {
	$session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> User not found!</div>";
	} else {
		
		$profit = Profit::profitperday($user->id);
		
		
	}
	
	
}



?>

<div class="row">

	
	<div class="col-md-12">
		<?php echo $session->message ?>
	</div>
	
		<div class="col-md-4">
		
			<div class="card">
				<div class="card-header">
					<h4>Edit User Profit</h4>
				</div>
				
				<div class="card-body">
				
				
							<form action="" method="post">
							
								<div class="form-group">
								
									<label for="profit">Profit per day</label>
									<input type="text" class="form-control" name="profit" value="<?php echo $profit->profit ?>">
								
								</div>
								<input type="hidden" name="username" value="<?php echo $user->id ?>">
								<div class="form-group">
									<button type="submit" class="btn btn-info" name="updateM">Update</button>
								</div>
								
							</form>

				</div>
				
			</div>
		
		</div>
	
		<div class="col-md-8">
    
	
	
				<div class="card">
					<div class="card-header">
						<h4>Edit User information</h4>
					</div>
				<div class="card-body">
							
					
					<form action="" method="post">
					
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="username" value="<?php echo $user->username ?>">
						</div>
						
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" value="<?php echo $user->email ?>">
						</div>
						
						<div class="form-group">
							<label for="balance">Balance</label>
							<input type="text" class="form-control" name="balance" value="<?php echo $user->balance ?>">
						</div>
						
						<div class="form-group">
							<label for="deposit">Total Deposit</label>
							<input type="text" class="form-control" name="total_deposit" value="<?php echo $user->total_deposit ?>">
						</div>
						
						<div class="form-group">
							<label for="payment_address">Payment Address</label>
							<input type="text" class="form-control" name="payment_address" value="<?php echo $user->payment_address ?>">
						</div>
						
						<input type="hidden" name="id" value="<?php echo $user->id ?>">
						
						<div class="form-group">
						<button type="submit" class="btn btn-primary" name="update">Update</button>
						</div>
					</form>
					
				</div>
				</div>
		
		</div>

</div>