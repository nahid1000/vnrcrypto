<?php

$get = $_GET['username'];



if(empty($get)) {
	
	redirect('users');
	
} else {
	
	$user = Users::find_user_by_usernameh($get);
	
	if($user == false) {
	$session->message = "<div class='alert alert-warning' role='alert'><strong>Warning!</strong> User not found!</div>";
	} else {
		
		$profit = Profit::profitperday($user->id);
		
		$miners = Plan::get_plans_by_username($user->id);
		
		$payments = Payment::get_payments($get);
		
		$withdrawals = Users::get_withdrawal_requests($get);
		
	}
	
	
}



?>

<div class="row">

    <div class="col-md-12">
    
        <div class="card">
            <div class="card-header">
                <h4>User information</h4>
            </div>
        <div class="card-body">
            
            <div class="card" style="width: 100&;">
              <div class="card-body">
                <h5 class="card-title">Basic Info</h5>
                <p class="card-text">
                  
                <div class="table-responsive">
                    <table class="table align-items-center table-white">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Total Deposits</th>
                                <th scope="col">Profit/Day</th>
                                <th scope="col">Profit Referrals</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if($user) : ?>
                            
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><?php echo $user->username; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->balance; ?></td>
                                <td><?php echo $user->total_deposit; ?></td>
                                
                                <?php if(!$profit) : ?>
                                <td>No Miners</td>
                                <?php else: ?>
                                <td><?php echo $profit->profit; ?></td>
                                <?php endif; ?>
                                <td><?php echo $user->earnings; ?></td>
                            </tr>
                            
                            <?php else: ?>
                            
                            <?php echo $session->message; ?>
                            
                            <?php endif; ?>

                        </tbody>
                        
                    </table>

                </div> 
                  
                </p>
                
              </div>
            </div>
            
            <div class="default-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-plans" role="tab" aria-controls="nav-home" aria-selected="true">Plans</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-deposits" role="tab" aria-controls="nav-profile" aria-selected="false">Deposits</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-withdrawals" role="tab" aria-controls="nav-contact" aria-selected="false">Withdrawals</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-plans" role="tabpanel" aria-labelledby="nav-home-tab">
                    
                    <div class="card" style="width: 100&;">
              <div class="card-body">
                <p class="card-text">
                  
                    <div class="table-responsive">
    <table class="table align-items-center table-dark">
    
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Expires in</th>
            <th scope="col">Profit/Day</th>
            <th scope="col">Status</th>

        </tr>
    </thead>
    <tbody>
                                                        <?php 
                                                            $place = "";

                                                            if(empty($miners)) {
                                                                echo "Not found";
                                                            } else {
                                                                foreach($miners as $miner) {
                                                            $place = ++$place;
                                                          ?>

                                                            <tr>
                                                            <td><?php echo $place; ?></td>
                                                            <td><strong><?php echo $miner->name; ?></strong></td>
                                                            <td>
                                                            <?php 

                                                                            $adate = $miner->end;

                                                                            $current_date = new DateTime(date('Y-m-d'), new DateTimeZone('Asia/Dhaka'));
                                                                            $end_date = new DateTime("$adate", new DateTimeZone('Asia/Dhaka'));
                                                                            $interval = $current_date->diff($end_date);

                                                            ?> 

                                                            <?php 

                                                            if($interval->format('%a') > 999 ) {
                                                                echo "never";
                                                            } else {

                                                                echo $interval->format('%a') . " day(s) left";

                                                            }

                                                            ?>


                                                            </td> 
                                                            <td><?php echo $miner->profit; ?></td>
                                                            <td>

                                                                <?php if($miner->status == 'active') : ?>

                                                                <button class="btn btn-success"><span class="gradient">Active</span></button>

                                                                <?php else: ?>

                                                                <a class="btn btn-danger">Pending</a>

                                                                <?php endif; ?>


                                                            </td>
                                                          </tr>

                                                          <?php } ?>
                                                            <?php } ?>
    </tbody>
</table>

</div> 
                  
                  

                  
                </p>
                
              </div>
            </div>        
                        
                    </div>
                    <div class="tab-pane fade" id="nav-deposits" role="tabpanel" aria-labelledby="nav-profile-tab">
                    
                        <div class="table-responsive">
                        <table class="table align-items-center table-dark">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Value</th>
                                <th scope="col">Txid</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                      <?php 
                        $place = "";
						
						if(empty($payments)) {
							echo "Not found";
						} else {
							
							foreach($payments as $payment) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $place; ?></td>
							<td><?php echo $payment->value; ?> </td>
							<td><?php echo $payment->txid; ?></td>
							<td><?php echo $payment->deposit_date; ?></td>
							<td>
							<?php if($payment->status == 0) : ?>
							<button class="btn btn-small btn-pink"><span class="gradient">Pending</span></button>
							<?php else: ?>
							
								<?php if($payment->status == 100) : ?>
								
									<button class="btn btn-success"><span class="gradient">Complete</span></button>
								
								<?php else: ?>
								
									<button class="btn btn-small btn-pink"><span class="gradient">Active</span></button>
								<?php endif; ?>

							<?php endif; ?>
							</td>
						</tr>
                        
                      <?php } ?> 
							
						<?php } ?>
						
                           
                        
    </tbody>
</table>

</div>     
                        
                    </div>
                    <div class="tab-pane fade" id="nav-withdrawals" role="tabpanel" aria-labelledby="nav-contact-tab">
                    
                        <div class="table-responsive">
                        <table class="table align-items-center table-dark">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Address</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                      <?php 
                        $place = "";
						
						if(empty($withdrawals)) {
							echo "Not found";
						} else {
							
							foreach($withdrawals as $withdrawal) {
                        $place = ++$place;
                      ?>
                        
                        <tr>
							<td><?php echo $place; ?></td>
							<td><?php echo $withdrawal->address; ?> </td>
							<td><?php echo $withdrawal->amount; ?></td>
							<td>
							<?php if($withdrawal->status == 'pending') : ?>
							<button class="btn btn-warning"><span class="gradient">Pending</span></button>
							<?php else: ?>

									<button class="btn btn-success"><span class="gradient">Paid</span></button>

							<?php endif; ?>
							</td>
						</tr>
                        
                      <?php } ?> 
							
						<?php } ?>
                           
                        
    </tbody>
</table>

</div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    </div>

</div>